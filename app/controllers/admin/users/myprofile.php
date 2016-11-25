<?php
/*
 * Created by PhpStorm.
 * User: Romeo
 * Full Name: Syed Rakibul Islam
 * Email: romeomyname@gmail.com
 * Contact: +880-1737094969
 * Date: 21-Nov-16
 * Time: 10:15 AM
 */

use Carbon\Carbon;
use Sirius\Upload\Handler as UploadHandler;
use Aura\Session\SessionFactory;

class MyProfile extends AdminController
{

    public function index()
    {
        /*
         * ************************
         * Session Factory
         * ************************
         */
        $session_factory = new SessionFactory;
        $session = $session_factory->newInstance($_COOKIE);

        $segment = $session->getSegment('admin/users/myprofile/index');
        $message = $segment->getFlash('message', 'Not Set');

        $user = UserModel::find($_SESSION['userid']);
        if (isset($user->userProfile->image))
        {
            $subPath = $this->ImageDir($user->userProfile->updated_at);
            $imgPath = '/public/images/users/' . $subPath . '/' . $user->userProfile->image;
        }
        else
        {
            $imgPath = '/public/images/users/avatar.jpg';
        }

        $segment = $session->getSegment('admin/users/myprofile/index');

        $this->view('admin/users/myprofile/index', ['message' => $message, 'user' => $user, 'imgPath' => $imgPath]);
    }
    public function edit_image()
    {
        /*
         * ************************
         * Session Factory
         * ************************
         */
        $session_factory = new SessionFactory;
        $session = $session_factory->newInstance($_COOKIE);


        $segment = $session->getSegment('admin/users/myprofile/edit_image');
        $message = $segment->getFlash('message', 'Not Set');

        $this->view('admin/users/myprofile/edit_image', ['message' => $message]);
    }
    public function store_image()
    {
        include_once ('functions/RootURL.php');
        include_once ('functions/RedirectURL.php');

        if (isset($_FILES['image']))
        {

            /*
             * ************************
             * Session Factory
             * ************************
             */
            $session_factory = new SessionFactory;
            $session = $session_factory->newInstance($_COOKIE);

            /*
             * Carbon DateTimestamp
             */
            $thiYear = Carbon::now()->year;
            $thiMonth = Carbon::now()->month;
            $thiDay = Carbon::now()->day;
            $thisTime = Carbon::now()->timestamp;

            /*
             * ******************************
             * Set Image Directory
             * *****************************
             */
            $mainDir = 'public/images/users';
            if (!is_dir($mainDir . '/' . $thiYear))
            {
                mkdir($mainDir . '/' . $thiYear);
            }
            if (!is_dir($mainDir . '/' . $thiYear . '/' . $thiMonth))
            {
                mkdir($mainDir . '/' . $thiYear . '/' . $thiMonth);
            }
            if (!is_dir($mainDir . '/' . $thiYear . '/' . $thiMonth . '/' . $thiDay))
            {
                mkdir($mainDir . '/' . $thiYear . '/' . $thiMonth . '/' . $thiDay);
            }

            $uploadHandler = new UploadHandler($mainDir . '/' . $thiYear . '/' . $thiMonth . '/' . $thiDay);

            // validation rules
            $uploadHandler->addRule('extension', ['allowed' => ['jpg', 'jpeg', 'png']], ' should be a valid image (jpg, jpeg, png) and also less than 1MB', 'Profile picture');
            $uploadHandler->addRule('size', ['max' => '1M'], '{label} should have less than {max}', 'Profile picture');
            $uploadHandler->setPrefix($thisTime . '__');


            $userProfile = UserProfileModel::find($_SESSION['userid']);
            if (isset($userProfile->image))
            {
                $result = $uploadHandler->process($_FILES['image']); // ex: subdirectory/my_headshot.png

                if ($result->isValid()) {
                    // do something with the image like attaching it to a model etc
                    try {
                        $subPath = $this->ImageDir($userProfile->updated_at);
                        $imgPath = 'public/images/users/' . $subPath . '/' . $userProfile->image;
                        if(unlink($imgPath)) {
                            $setImage = $userProfile->update(array(
                                'image' => $result->name,
                                'user_id' => $_SESSION['userid']
                            ));
                            if (isset($setImage)) {
                                $result->confirm(); // this will remove the .lock file
                                /*
                                 * ******************************
                                 * Flash Session
                                 * *****************************
                                 */
                                $segment = $session->getSegment('admin/users/myprofile/index');
                                $sessionMessage = [
                                    'type' => 'success',
                                    'title' => 'Success',
                                    'message' => '​Update my profile picture'];
                                $segment->setFlash('message', $sessionMessage);

                                /*
                                 * ******************************
                                 * Redirect URL
                                 * *****************************
                                 */
                                $urlPath = root() . '/admin/users/myprofile/';
                                redirect($urlPath);
                            }
                            else
                            {
                                /*
                                 * ******************************
                                 * Flash Session
                                 * *****************************
                                 */
                                $segment = $session->getSegment('admin/users/myprofile/edit_image');
                                $sessionMessage = [
                                    'type' => 'danger',
                                    'title' => 'Error',
                                    'message' => 'Something missing!! Please try again....'];
                                $segment->setFlash('message', $sessionMessage);

                                /*
                                 * ******************************
                                 * Redirect URL
                                 * *****************************
                                 */
                                $urlPath = root() . '/admin/users/myprofile/edit_image';
                                redirect($urlPath);
                            }
                        }
                        else
                        {
                            /*
                             * ******************************
                             * Flash Session
                             * *****************************
                             */
                            $segment = $session->getSegment('admin/users/myprofile/edit_image');
                            $sessionMessage = [
                                'type' => 'danger',
                                'title' => 'Error',
                                'message' => 'Old image directory missing.'];
                            $segment->setFlash('message', $sessionMessage);

                            /*
                             * ******************************
                             * Redirect URL
                             * *****************************
                             */
                            $urlPath = root() . '/admin/users/myprofile/edit_image';
                            redirect($urlPath);
                        }
                    } catch (\Exception $e) {
                        // something wrong happened, we don't need the uploaded files anymore
                        $result->clear();
                        throw $e;
                    }
                }
                else
                {
                    // image was not moved to the container, where are error messages

                    /*
                     * ******************************
                     * Flash Session
                     * *****************************
                     */
                    $segment = $session->getSegment('admin/users/myprofile/edit_image');
                    $sessionMessage = [
                        'type' => 'danger',
                        'title' => 'Error',
                        'message' => $result->getMessages()[0]->template];
                    $segment->setFlash('message', $sessionMessage);

                    /*
                     * ******************************
                     * Redirect URL
                     * *****************************
                     */
                    $urlPath = root() . '/admin/users/myprofile/edit_image';
                    redirect($urlPath);
                }
            }
            else
            {
                $result = $uploadHandler->process($_FILES['image']); // ex: subdirectory/my_headshot.png

                if ($result->isValid()) {
                    // do something with the image like attaching it to a model etc
                    try {
                        if (isset($userProfile->id))
                        {
                            $setImage = $userProfile->update(array(
                                'image' => $result->name,
                                'user_id' => $_SESSION['userid']
                            ));
                            if (isset($setImage))
                            {
                                $result->confirm(); // this will remove the .lock file


                                /*
                                 * ******************************
                                 * Redirect URL
                                 * *****************************
                                 */
                                $urlPath = root() . '/admin/users/myprofile/';
                                redirect($urlPath);
                            }
                        }
                        else
                        {
                            $setImage = UserProfileModel::create([
                                'id' => $_SESSION['userid'],
                                'image' => $result->name,
                                'user_id' => $_SESSION['userid']
                            ]);
                            if (isset($setImage))
                            {
                                $result->confirm(); // this will remove the .lock file
                                $urlPath = root() . '/admin/users/myprofile/';
                                redirect($urlPath);
                            }
                        }

                    } catch (\Exception $e) {
                        // something wrong happened, we don't need the uploaded files anymore
                        $result->clear();
                        throw $e;
                    }
                }
                else
                {
                    // image was not moved to the container, where are error messages

                    /*
                     * ******************************
                     * Flash Session
                     * *****************************
                     */
                    $segment = $session->getSegment('admin/users/myprofile/edit_image');
                    $sessionMessage = [
                        'type' => 'danger',
                        'title' => 'Error',
                        'message' => $result->getMessages()[0]->template];
                    $segment->setFlash('message', $sessionMessage);

                    /*
                     * ******************************
                     * Redirect URL
                     * *****************************
                     */
                    $urlPath = root() . 'admin/users/MyProfile';
                    redirect($urlPath);
                }
            }
        }
        else
        {
            $this->view('admin/errors/404');
        }

    }
    public function edit_profile()
    {
        $this->view('admin/users/myprofile/edit_profile', []);
    }
    public function store_profile()
    {

    }

    private function ImageDir($dateTime)
    {
        $dateTime = Carbon::parse($dateTime);
        $thisYear = $dateTime->year;
        $thisMonth = $dateTime->month;
        $thisDay = $dateTime->day;
        return ($thisYear . '/' . $thisMonth . '/' . $thisDay);
    }
    private function setSessionMessage()
    {

    }
    private function getSessionMessage()
    {
        /*
         * ************************
         * Session Factory
         * ************************
         */
        $session_factory = new SessionFactory;
        $session = $session_factory->newInstance($_COOKIE);
    }

}
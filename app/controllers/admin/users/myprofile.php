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
use Sirius\Validation\RuleFactory;
use Sirius\Validation\ErrorMessage;
use Sirius\Validation\Validator;

class MyProfile extends AdminController
{

    public function index()
    {
        /*
         * ************************
         * Session Factory
         * ************************
         */
        $message = $this->getSessionMessage('admin/users/myprofile/index');


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

        /*
         * ************************
         * View
         * ************************
         */
        $this->view('admin/users/myprofile/index', ['message' => $message, 'user' => $user, 'imgPath' => $imgPath]);
    }
    public function edit_image()
    {
        /*
         * ************************
         * Session Factory
         * ************************
         */
        $message = $this->getSessionMessage('admin/users/myprofile/edit_image');

        /*
         * ************************
         * View
         * ************************
         */
        $this->view('admin/users/myprofile/edit_image', ['message' => $message]);
    }
    public function store_image()
    {
        include_once ('functions/RootURL.php');
        include_once ('functions/RedirectURL.php');

        if (isset($_FILES['image']))
        {
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
                                $sessionMessage = [
                                    'type' => 'success',
                                    'title' => 'Success',
                                    'message' => 'Profile picture updated!!'];
                                $this->setSessionMessage('admin/users/myprofile/index', $sessionMessage);

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
                                $sessionMessage = [
                                    'type' => 'danger',
                                    'title' => 'Error',
                                    'message' => 'Something missing!! Please try again....'];
                                $this->setSessionMessage('admin/users/myprofile/edit_image', $sessionMessage);

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

                            $sessionMessage = [
                                'type' => 'danger',
                                'title' => 'Error',
                                'message' => 'Old image directory missing.'];
                            $this->setSessionMessage('admin/users/myprofile/edit_image', $sessionMessage);

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
                    $sessionMessage = [
                        'type' => 'danger',
                        'title' => 'Error',
                        'message' => $result->getMessages()[0]->template];
                    $this->setSessionMessage('admin/users/myprofile/edit_image', $sessionMessage);

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
                                 * Flash Session
                                 * *****************************
                                 */
                                $sessionMessage = [
                                    'type' => 'success',
                                    'title' => 'Success',
                                    'message' => 'Profile picture added!!'];
                                $this->setSessionMessage('admin/users/myprofile/index', $sessionMessage);
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

                                /*
                                 * ******************************
                                 * Flash Session
                                 * *****************************
                                 */
                                $sessionMessage = [
                                    'type' => 'success',
                                    'title' => 'Success',
                                    'message' => 'Profile picture added!!'];
                                $this->setSessionMessage('admin/users/myprofile/index', $sessionMessage);

                                /*
                                 * ******************************
                                 * Redirect URL
                                 * *****************************
                                 */
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
                    $sessionMessage = [
                        'type' => 'danger',
                        'title' => 'Error',
                        'message' => $result->getMessages()[0]->template];
                    $this->setSessionMessage('admin/users/myprofile/edit_image', $sessionMessage);

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
        $user = UserModel::find($_SESSION['userid']);
        $this->view('admin/users/myprofile/edit_profile', ['user' => $user]);
    }
    public function store_profile()
    {
        include_once ('functions/RootURL.php');
        include_once ('functions/RedirectURL.php');

        if (isset($_POST['submit']))
        {
            $name = $_POST['name'];
            $birth = $_POST['birth'];
            $gender = '';
            if(isset($_POST['gender']))
            {
                $gender = $_POST['gender'];
            }
            $email = $_POST['email'];
            $address = $_POST['address'];
            $contact = $_POST['contact'];
            $profession = $_POST['profession'];
            $company = $_POST['company'];
            $designation = $_POST['designation'];
            $about = $_POST['about'];
            $website = $_POST['website'];
            $facebook = $_POST['facebook'];
            $twitter = $_POST['twitter'];
            $googleplus = $_POST['googleplus'];
            $linkedin = $_POST['linkedin'];
            $github = $_POST['github'];

            $ruleFactory = new RuleFactory;
            $errorMessagePrototype = new ErrorMessage;
            $validator = new Validator($ruleFactory, $errorMessagePrototype);
            $validator->add(array(
                'name:Name' => 'required | minlength(min=4) | maxlength(100)({label} must have less than {max} characters)',
                'birth:Birth Date' => 'Date',
                'email:Email' => 'required | Email',
                'address:Address' => 'minlength(min=10) | maxlength(255)',
                'contact:Contact' => 'minlength(min=5) | maxlength(50)',
                'profession:Profession' => 'minlength(min=5) | maxlength(50)',
                'company:Company' => 'minlength(min=5) | maxlength(100)',
                'designation:Designation' => 'minlength(min=5) | maxlength(50)',
                'about:About me' => 'minlength(min=10) | maxlength(255)',
                'website:Website' => 'website | maxlength(255)',
                'facebook:Facebook' => 'website | maxlength(255)',
                'twitter:Twitter' => 'website | maxlength(255)',
                'googleplus:Googleplus' => 'website | maxlength(255)',
                'linkedin:Linkedin' => 'website | maxlength(255)',
                'github:Github' => 'website | maxlength(255)'
            ));

            if ($validator->validate($_POST))
            {
                $userProfile = UserProfileModel::find($_SESSION['userid']);
                if(isset($userProfile->id))
                {
                    $userProfile->user->update(array(
                        'name' => $name,
                        'email' => $email,
                        'contact' => $contact
                    ));
                    $updateProfile = $userProfile->update(array(
                        'birth_date' => $birth,
                        'gender' => $gender,
                        'address' => $address,
                        'profession' => $profession,
                        'company_name' => $company,
                        'designation' => $designation,
                        'website' => $website,
                        'about' => $about,
                        'fb' => $facebook,
                        'tw' => $twitter,
                        'gplus' => $googleplus,
                        'ln' => $linkedin,
                        'git' => $github,
                        'user_id' => $_SESSION['userid']
                    ));
                    if(isset($updateProfile))
                    {
                        /*
                         * ******************************
                         * Flash Session
                         * *****************************
                         */
                        $sessionMessage = [
                            'type' => 'success',
                            'title' => 'Success',
                            'message' => 'Profile picture updated!!'];
                        $this->setSessionMessage('admin/users/myprofile/index', $sessionMessage);
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
                        echo 'error';
                    }
                }
                else
                {
                    $user = UserModel::find($_SESSION['userid']);
                    $user->update(array(
                        'name' => $name,
                        'email' => $email,
                        'contact' => $contact
                    ));
                    $storeProfile = UserProfileModel::create([
                        'id' => $_SESSION['userid'],
                        'birth_date' => $birth,
                        'gender' => $gender,
                        'address' => $address,
                        'profession' => $profession,
                        'company_name' => $company,
                        'designation' => $designation,
                        'website' => $website,
                        'about' => $about,
                        'fb' => $facebook,
                        'tw' => $twitter,
                        'gplus' => $googleplus,
                        'ln' => $linkedin,
                        'git' => $github,
                        'user_id' => $_SESSION['userid']
                    ]);
                    if(isset($storeProfile->id))
                    {
                        /*
                         * ******************************
                         * Flash Session
                         * *****************************
                         */
                        $sessionMessage = [
                            'type' => 'success',
                            'title' => 'Success',
                            'message' => 'Profile picture updated!!'];
                        $this->setSessionMessage('admin/users/myprofile/index', $sessionMessage);
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
                        echo 'error';
                    }
                }


            }

//            echo validate;
        }
        else
        {
            $this->view('admin/errors/404');
        }
    }




    private function ImageDir($dateTime)
    {
        $dateTime = Carbon::parse($dateTime);
        $thisYear = $dateTime->year;
        $thisMonth = $dateTime->month;
        $thisDay = $dateTime->day;
        return ($thisYear . '/' . $thisMonth . '/' . $thisDay);
    }
    private function setSessionMessage($next, $message)
    {
        /*
         * ************************
         * Session Factory
         * ************************
         */
        $session_factory = new SessionFactory;
        $session = $session_factory->newInstance($_COOKIE);

        $segment = $session->getSegment($next);
        $segment->setFlash('message', $message);
    }
    private function getSessionMessage($path)
    {
        /*
         * ************************
         * Session Factory
         * ************************
         */
        $session_factory = new SessionFactory;
        $session = $session_factory->newInstance($_COOKIE);

        $segment = $session->getSegment($path);
        $message = $segment->getFlash('message', 'Not Set');
        return $message;
    }
}
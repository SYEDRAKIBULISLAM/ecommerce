/*
 * Created by PhpStorm.
 * User: Romeo
 * Full Name: Syed Rakibul Islam
 * Email: romeomyname@gmail.com
 * Contact: +880-1737094969
 * Date: 05-Nov-16
 * Time: 10:17 AM
 */
 /*
  **************************************
  * Create Table """"supers""""
  **************************************
  */
  
CREATE TABLE IF NOT EXISTS `supers`(
  `id` INT PRIMARY KEY,
  `user_id` INT NOT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  FOREIGN KEY (`id`)
    REFERENCES `admins`(`id`)
    ON UPDATE CASCADE
    ON DELETE RESTRICT,
  FOREIGN KEY (`user_id`)
    REFERENCES `users`(`id`)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
)
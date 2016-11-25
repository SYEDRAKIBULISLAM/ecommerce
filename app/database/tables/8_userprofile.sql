/*
 * Created by PhpStorm.
 * User: Romeo
 * Full Name: Syed Rakibul Islam
 * Email: romeomyname@gmail.com
 * Contact: +880-1737094969
 * Date: 21-Nov-16
 * Time: 2:57 PM
 */
 /*
  **************************************
  * Create Table """"userprofile""""
  **************************************
  */
  
CREATE TABLE IF NOT EXISTS `userprofile`(
    `id` INT PRIMARY KEY ,
    `birth_date` TIMESTAMP NULL,
    `gender` VARCHAR(10) NULL,
    `address` VARCHAR(255) NULL,
    `profession` VARCHAR(100) NULL,
    `company_name` VARCHAR(50) NULL,
    `designation` VARCHAR(255) NULL,
    `website` VARCHAR(255) NULL,
    `about` VARCHAR(255) NULL,
    `image` VARCHAR(255) NULL,
    `fb` VARCHAR(255) NULL,
    `tw` VARCHAR(255) NULL,
    `gplus` VARCHAR(255) NULL,
    `ln` VARCHAR(255) NULL,
    `git` VARCHAR(255) NULL,
    `user_id` INT NOT NULL,
    `created_at` TIMESTAMP NULL,
    `updated_at` TIMESTAMP NULL,
    FOREIGN KEY (`id`)
      REFERENCES `users`(`id`)
      ON UPDATE CASCADE
      ON DELETE RESTRICT,
    FOREIGN KEY (`user_id`)
      REFERENCES `users`(`id`)
      ON UPDATE CASCADE
      ON DELETE RESTRICT
)
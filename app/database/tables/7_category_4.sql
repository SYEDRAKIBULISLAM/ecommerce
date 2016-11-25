/*
 * Created by PhpStorm.
 * User: Romeo
 * Full Name: Syed Rakibul Islam
 * Email: romeomyname@gmail.com
 * Contact: +880-1737094969
 * Date: 12-Nov-16
 * Time: 3:19 PM
 */
 /*
  **************************************
  * Create Table """"category_4""""
  **************************************
  */
  
CREATE TABLE IF NOT EXISTS `category_4`(
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `category_3_id` INT NOT NULL,
    `user_id` INT NOT NULL,
    `created_at` TIMESTAMP NULL,
    `updated_at` TIMESTAMP NULL,
    FOREIGN KEY (`category_3_id`)
      REFERENCES `category_3`(`id`)
      ON UPDATE CASCADE
      ON DELETE RESTRICT,
    FOREIGN KEY (`user_id`)
      REFERENCES `users`(`id`)
      ON UPDATE CASCADE
      ON DELETE RESTRICT
)
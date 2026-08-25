-- L.I.M.E database schema
-- Compatible with XAMPP / MariaDB 10.4+

CREATE DATABASE IF NOT EXISTS lime_db
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_general_ci;

USE lime_db;

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `role` ENUM('student','company') NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `uq_user_email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS `institution` (
  `institution_id` INT NOT NULL AUTO_INCREMENT,
  `institution_name` VARCHAR(255) NOT NULL,
  `type` ENUM('University','College','TVET','Other') DEFAULT NULL,
  `country` VARCHAR(100) DEFAULT 'South Africa',
  `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`institution_id`),
  UNIQUE KEY `uq_institution_name` (`institution_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS `student` (
  `student_id` INT NOT NULL AUTO_INCREMENT,
  `user_id` INT NOT NULL,
  `institution_id` INT DEFAULT NULL,
  `first_name` VARCHAR(100) NOT NULL,
  `surname` VARCHAR(100) NOT NULL,
  `institution` VARCHAR(150) DEFAULT NULL COMMENT 'Legacy text field kept temporarily during migration to institution_id',
  `linkedin_url` VARCHAR(255) DEFAULT NULL,
  `github_url` VARCHAR(255) DEFAULT NULL,
  `profile_picture` VARCHAR(255) DEFAULT NULL,
  `date_registered` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `student_id_number` VARCHAR(50) DEFAULT NULL,
  `verification_status` ENUM('Pending','Verified') DEFAULT 'Pending',
  PRIMARY KEY (`student_id`),
  UNIQUE KEY `uq_student_user` (`user_id`),
  KEY `idx_student_institution` (`institution_id`),
  CONSTRAINT `fk_student_user`
    FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE,
  CONSTRAINT `fk_student_institution`
    FOREIGN KEY (`institution_id`) REFERENCES `institution` (`institution_id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS `company` (
  `company_id` INT NOT NULL AUTO_INCREMENT,
  `user_id` INT NOT NULL,
  `name` VARCHAR(150) NOT NULL,
  `registration_num` VARCHAR(100) DEFAULT NULL,
  `official_email` VARCHAR(255) DEFAULT NULL,
  `domain` VARCHAR(150) DEFAULT NULL,
  `industry` VARCHAR(100) DEFAULT NULL,
  `website` VARCHAR(255) DEFAULT NULL,
  `verification_status` ENUM('Pending','Approved','Rejected') DEFAULT 'Pending',
  `date_registered` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`company_id`),
  UNIQUE KEY `uq_company_user` (`user_id`),
  CONSTRAINT `fk_company_user`
    FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS `skill` (
  `skill_id` INT NOT NULL AUTO_INCREMENT,
  `skill_name` VARCHAR(100) NOT NULL,
  `category` VARCHAR(100) DEFAULT NULL,
  PRIMARY KEY (`skill_id`),
  UNIQUE KEY `uq_skill_name` (`skill_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS `project` (
  `project_id` INT NOT NULL AUTO_INCREMENT,
  `student_id` INT NOT NULL,
  `type` ENUM('Project','Assignment') NOT NULL,
  `title` VARCHAR(200) NOT NULL,
  `description` TEXT DEFAULT NULL,
  `filepath` VARCHAR(255) DEFAULT NULL,
  `date_posted` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ai_generated_description` TEXT DEFAULT NULL,
  `ai_suggested_improvements` TEXT DEFAULT NULL,
  PRIMARY KEY (`project_id`),
  KEY `idx_project_student` (`student_id`),
  CONSTRAINT `fk_project_student`
    FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS `projectskill` (
  `project_id` INT NOT NULL,
  `skill_id` INT NOT NULL,
  PRIMARY KEY (`project_id`,`skill_id`),
  KEY `idx_projectskill_skill` (`skill_id`),
  CONSTRAINT `fk_projectskill_project`
    FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`) ON DELETE CASCADE,
  CONSTRAINT `fk_projectskill_skill`
    FOREIGN KEY (`skill_id`) REFERENCES `skill` (`skill_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS `studentskill` (
  `student_id` INT NOT NULL,
  `skill_id` INT NOT NULL,
  `source` ENUM('AI','Manual') DEFAULT 'Manual',
  PRIMARY KEY (`student_id`,`skill_id`),
  KEY `idx_studentskill_skill` (`skill_id`),
  CONSTRAINT `fk_studentskill_student`
    FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE,
  CONSTRAINT `fk_studentskill_skill`
    FOREIGN KEY (`skill_id`) REFERENCES `skill` (`skill_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS `opportunity` (
  `opportunity_id` INT NOT NULL AUTO_INCREMENT,
  `company_id` INT NOT NULL,
  `title` VARCHAR(200) NOT NULL,
  `description` TEXT DEFAULT NULL,
  `type` ENUM('Internship','Workshop','WIL') NOT NULL,
  `required_skills` VARCHAR(255) DEFAULT NULL,
  `location` VARCHAR(150) DEFAULT NULL,
  `date_posted` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deadline` DATE DEFAULT NULL,
  `status` ENUM('Open','Closed') DEFAULT 'Open',
  PRIMARY KEY (`opportunity_id`),
  KEY `idx_opportunity_company` (`company_id`),
  CONSTRAINT `fk_opportunity_company`
    FOREIGN KEY (`company_id`) REFERENCES `company` (`company_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS `application` (
  `application_id` INT NOT NULL AUTO_INCREMENT,
  `student_id` INT NOT NULL,
  `opportunity_id` INT NOT NULL,
  `apply_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` ENUM('Pending','Accepted','Rejected') DEFAULT 'Pending',
  PRIMARY KEY (`application_id`),
  KEY `idx_application_student` (`student_id`),
  KEY `idx_application_opportunity` (`opportunity_id`),
  CONSTRAINT `fk_application_student`
    FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE,
  CONSTRAINT `fk_application_opportunity`
    FOREIGN KEY (`opportunity_id`) REFERENCES `opportunity` (`opportunity_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS `message` (
  `message_id` INT NOT NULL AUTO_INCREMENT,
  `sender_user_id` INT NOT NULL,
  `receiver_user_id` INT NOT NULL,
  `content` TEXT NOT NULL,
  `timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_read` TINYINT(1) DEFAULT 0,
  PRIMARY KEY (`message_id`),
  KEY `idx_message_sender` (`sender_user_id`),
  KEY `idx_message_receiver` (`receiver_user_id`),
  CONSTRAINT `fk_message_sender`
    FOREIGN KEY (`sender_user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE,
  CONSTRAINT `fk_message_receiver`
    FOREIGN KEY (`receiver_user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS `notification` (
  `notification_id` INT NOT NULL AUTO_INCREMENT,
  `user_id` INT NOT NULL,
  `type` VARCHAR(100) DEFAULT NULL,
  `content` TEXT NOT NULL,
  `timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_read` TINYINT(1) DEFAULT 0,
  PRIMARY KEY (`notification_id`),
  KEY `idx_notification_user` (`user_id`),
  CONSTRAINT `fk_notification_user`
    FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS `recommendation` (
  `recommendation_id` INT NOT NULL AUTO_INCREMENT,
  `student_id` INT NOT NULL,
  `opportunity_id` INT NOT NULL,
  `relevance_score` DECIMAL(5,2) DEFAULT NULL,
  `ai_data` TEXT DEFAULT NULL,
  `date_generated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`recommendation_id`),
  KEY `idx_recommendation_student` (`student_id`),
  KEY `idx_recommendation_opportunity` (`opportunity_id`),
  CONSTRAINT `fk_recommendation_student`
    FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE,
  CONSTRAINT `fk_recommendation_opportunity`
    FOREIGN KEY (`opportunity_id`) REFERENCES `opportunity` (`opportunity_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` INT NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(100) NOT NULL,
  `surname` VARCHAR(100) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `permission_lvl` VARCHAR(50) DEFAULT NULL,
  PRIMARY KEY (`admin_id`),
  UNIQUE KEY `uq_admin_email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

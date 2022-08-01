CREATE TABLE `M_ADMINS` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `full_name` varchar(255),
  `address` varchar(255),
  `country_code` varchar(255),
  `phone_number` varchar(255),
  `email` varchar(255),
  `profile_image` varchar(255),
  `password` varchar(255),
  `is_deleted` boolean,
  `created_at` timestamp,
  `updated_at` timestamp
);

CREATE TABLE `M_GUIDES` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `guide_title` varchar(255),
  `action_by` int,
  `is_deleted` boolean,
  `created_at` timestamp,
  `updated_at` timestamp
);

CREATE TABLE `M_GUIDE_STEPS` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `sequence_number` int,
  `guide_id` int,
  `step_title` varchar(255),
  `step_details` varchar(255),
  `step_image` varchar(255),
  `action_by` int,
  `is_deleted` boolean,
  `created_at` timestamp,
  `updated_at` timestamp
);

CREATE TABLE `M_CONTACTS` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `phone_number` varchar(255),
  `email` varchar(255),
  `profile_image` varchar(255),
  `action_by` int,
  `is_deleted` boolean,
  `created_at` timestamp,
  `updated_at` timestamp
);

CREATE TABLE `M_POLICY` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `title` varchar(255),
  `description` varchar(255),
  `action_by` int,
  `is_deleted` boolean,
  `created_at` timestamp,
  `updated_at` timestamp
);

CREATE TABLE `M_SERVICE` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `title` varchar(255),
  `description` varchar(255),
  `image` varchar(255),
  `action_by` int,
  `is_deleted` boolean,
  `created_at` timestamp,
  `updated_at` timestamp
);

CREATE TABLE `M_ABOUT` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `title` varchar(255),
  `description` varchar(255),
  `image` varchar(255),
  `action_by` int,
  `is_deleted` boolean,
  `created_at` timestamp,
  `updated_at` timestamp
);

CREATE TABLE `M_SITE_MASTER` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `favicon` varchar(255),
  `logo` varchar(255),
  `welcome_title` varchar(255),
  `welcome_description` varchar(255),
  `welcome_image` varchar(255),
  `banner_title` varchar(255),
  `banner_image` varchar(255),
  `feature_title` varchar(255),
  `feature_images` json,
  `apply_instructor_title` varchar(255),
  `apply_instructor_image` varchar(255),
  `action_by` int,
  `created_at` timestamp,
  `updated_at` timestamp
);

CREATE TABLE `M_COURSE_CATEGORIES` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `caetgory_name` varchar(255),
  `action_by` int,
  `is_deleted` boolean,
  `created_at` timestamp,
  `updated_at` timestamp
);

CREATE TABLE `M_PAYMENT_METHODS` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `payment_name` varchar(255),
  `payment_logo` varchar(255),
  `action_by` int,
  `is_deleted` boolean,
  `created_at` timestamp,
  `updated_at` timestamp
);

CREATE TABLE `M_NOTIFICATIONS` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `noti_title` varchar(255),
  `noti_body` varchar(255),
  `target` ENUM ('ALL', 'STUDENTS', 'INSTRUCTORS'),
  `action_by` int,
  `created_at` timestamp,
  `updated_at` timestamp
);

CREATE TABLE `M_INSTRUCTORS` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `full_name` varchar(255),
  `profile_image` varchar(255),
  `job_position` varchar(255),
  `bio` varchar(255),
  `email` varchar(255),
  `phone` varchar(255),
  `address` varchar(255),
  `status` ENUM ('PENDING', 'APPROVED', 'REJECTED'),
  `password` varchar(255),
  `is_banned` boolean,
  `action_by` int,
  `created_at` timestamp,
  `updated_at` timestamp
);

CREATE TABLE `M_INSTRUCTOR_EXPERIENCES` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `instructor_id` int,
  `exp_title` varchar(255),
  `exp_type` varchar(255),
  `exp_start_date` timestamp,
  `exp_end_date` timestamp,
  `action_by` int,
  `created_at` timestamp,
  `updated_at` timestamp
);

CREATE TABLE `M_INSTRUCTOR_SOCIALS` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `instructor_id` int,
  `social_id` int,
  `social_url` varchar(255),
  `action_by` int,
  `created_at` timestamp,
  `updated_at` timestamp
);

CREATE TABLE `M_SOCIAL_NETWORKS` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255),
  `action_by` int,
  `created_at` timestamp,
  `updated_at` timestamp
);

CREATE TABLE `T_BLACKLIST` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `instructor_id` int,
  `reason` varchar(255),
  `action_by` int,
  `is_deleted` boolean,
  `created_at` timestamp,
  `updated_at` timestamp
);

CREATE TABLE `T_APPLEALS` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `instructor_id` int,
  `solution` varchar(255),
  `status` ENUM ('PENDING', 'RESOLVED'),
  `created_at` timestamp,
  `updated_at` timestamp
);

CREATE TABLE `M_COURSES` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `instructor_id` int,
  `course_title` varchar(255),
  `course_info` varchar(255),
  `course_description` varchar(255),
  `course_target` varchar(255),
  `price` double,
  `coure_cover_image` varchar(255),
  `promo_percent` int,
  `caetgory_id` int,
  `level_id` int,
  `duration` int,
  `is_deleted` boolean,
  `created_at` timestamp,
  `updated_at` timestamp
);

CREATE TABLE `M_COURSE_LEVELS` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `level_name` varchar(255),
  `action_by` int,
  `is_deleted` boolean,
  `created_at` timestamp,
  `updated_at` timestamp
);

CREATE TABLE `T_COURSE_PROFITS` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `profile_title` varchar(255),
  `course_id` int,
  `is_deleted` boolean,
  `created_at` timestamp,
  `updated_at` timestamp
);

CREATE TABLE `T_COURSE_REQUIREMENTS` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `requirement_title` varchar(255),
  `course_id` int,
  `is_deleted` boolean,
  `created_at` timestamp,
  `updated_at` timestamp
);

CREATE TABLE `T_CHAPTERS` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `course_id` int,
  `chapter_title` varchar(255),
  `created_at` timestamp,
  `updated_at` timestamp
);

CREATE TABLE `T_LECTURES` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `chapter_id` int,
  `lecture_title` varchar(255),
  `video_url` varchar(255),
  `lecture_description` varchar(255),
  `lecture_script` varchar(255),
  `created_at` timestamp,
  `updated_at` timestamp
);

CREATE TABLE `T_QUIZS` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `lecture_id` int,
  `question` varchar(255),
  `answer1` varchar(255),
  `answer2` varchar(255),
  `answer3` varchar(255),
  `correct_answer` varchar(255),
  `is_deleted` boolean,
  `created_at` timestamp,
  `updated_at` timestamp
);

CREATE TABLE `T_ORDER_LIST` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `order_number` varchar(255),
  `student_id` int,
  `course_id` int,
  `instructor_id` int,
  `order_price` double,
  `created_at` timestamp,
  `updated_at` timestamp
);

CREATE TABLE `T_COURSE_REVIEW_RATES` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `course_id` int,
  `student_id` int,
  `rating` int,
  `review` varchar(255),
  `created_at` timestamp,
  `updated_at` timestamp
);

CREATE TABLE `M_STUDENTS` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `full_name` varchar(255),
  `email` varchar(255),
  `password` varchar(255),
  `social_token` varchar(255),
  `social_type` ENUM ('FB', 'GOOGLE', 'TWITTER'),
  `is_deleted` boolean,
  `created_at` timestamp,
  `updated_at` timestamp
);

CREATE TABLE `T_STUDENT_PURCHASED_COURSES` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `student_id` int,
  `course_id` int,
  `progress` int,
  `is_deleted` boolean,
  `created_at` timestamp,
  `updated_at` timestamp
);

CREATE TABLE `T_STUDENT_WHISHLIST` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `student_id` int,
  `course_id` int,
  `created_at` timestamp,
  `is_deleted` boolean,
  `updated_at` timestamp
);

CREATE TABLE `T_STUDENT_CART` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `student_id` int,
  `course_id` int,
  `created_at` timestamp,
  `is_deleted` boolean,
  `updated_at` timestamp
);

ALTER TABLE `M_GUIDES` ADD FOREIGN KEY (`action_by`) REFERENCES `M_ADMINS` (`id`);

ALTER TABLE `M_GUIDE_STEPS` ADD FOREIGN KEY (`guide_id`) REFERENCES `M_GUIDES` (`id`);

ALTER TABLE `M_GUIDE_STEPS` ADD FOREIGN KEY (`action_by`) REFERENCES `M_ADMINS` (`id`);

ALTER TABLE `M_CONTACTS` ADD FOREIGN KEY (`action_by`) REFERENCES `M_ADMINS` (`id`);

ALTER TABLE `M_POLICY` ADD FOREIGN KEY (`action_by`) REFERENCES `M_ADMINS` (`id`);

ALTER TABLE `M_SERVICE` ADD FOREIGN KEY (`action_by`) REFERENCES `M_ADMINS` (`id`);

ALTER TABLE `M_ABOUT` ADD FOREIGN KEY (`action_by`) REFERENCES `M_ADMINS` (`id`);

ALTER TABLE `M_SITE_MASTER` ADD FOREIGN KEY (`action_by`) REFERENCES `M_ADMINS` (`id`);

ALTER TABLE `M_COURSE_CATEGORIES` ADD FOREIGN KEY (`action_by`) REFERENCES `M_ADMINS` (`id`);

ALTER TABLE `M_PAYMENT_METHODS` ADD FOREIGN KEY (`action_by`) REFERENCES `M_ADMINS` (`id`);

ALTER TABLE `M_NOTIFICATIONS` ADD FOREIGN KEY (`action_by`) REFERENCES `M_ADMINS` (`id`);

ALTER TABLE `M_INSTRUCTORS` ADD FOREIGN KEY (`action_by`) REFERENCES `M_ADMINS` (`id`);

ALTER TABLE `M_INSTRUCTOR_EXPERIENCES` ADD FOREIGN KEY (`instructor_id`) REFERENCES `M_INSTRUCTORS` (`id`);

ALTER TABLE `M_INSTRUCTOR_EXPERIENCES` ADD FOREIGN KEY (`action_by`) REFERENCES `M_ADMINS` (`id`);

ALTER TABLE `M_INSTRUCTOR_SOCIALS` ADD FOREIGN KEY (`instructor_id`) REFERENCES `M_INSTRUCTORS` (`id`);

ALTER TABLE `M_INSTRUCTOR_SOCIALS` ADD FOREIGN KEY (`social_id`) REFERENCES `M_SOCIAL_NETWORKS` (`id`);

ALTER TABLE `M_INSTRUCTOR_SOCIALS` ADD FOREIGN KEY (`action_by`) REFERENCES `M_ADMINS` (`id`);

ALTER TABLE `M_SOCIAL_NETWORKS` ADD FOREIGN KEY (`action_by`) REFERENCES `M_ADMINS` (`id`);

ALTER TABLE `T_BLACKLIST` ADD FOREIGN KEY (`instructor_id`) REFERENCES `M_INSTRUCTORS` (`id`);

ALTER TABLE `T_BLACKLIST` ADD FOREIGN KEY (`action_by`) REFERENCES `M_ADMINS` (`id`);

ALTER TABLE `T_APPLEALS` ADD FOREIGN KEY (`instructor_id`) REFERENCES `M_INSTRUCTORS` (`id`);

ALTER TABLE `M_COURSES` ADD FOREIGN KEY (`instructor_id`) REFERENCES `M_INSTRUCTORS` (`id`);

ALTER TABLE `M_COURSES` ADD FOREIGN KEY (`caetgory_id`) REFERENCES `M_COURSE_CATEGORIES` (`id`);

ALTER TABLE `M_COURSES` ADD FOREIGN KEY (`level_id`) REFERENCES `M_COURSE_LEVELS` (`id`);

ALTER TABLE `M_COURSE_LEVELS` ADD FOREIGN KEY (`action_by`) REFERENCES `M_ADMINS` (`id`);

ALTER TABLE `T_COURSE_PROFITS` ADD FOREIGN KEY (`course_id`) REFERENCES `M_COURSES` (`id`);

ALTER TABLE `T_COURSE_REQUIREMENTS` ADD FOREIGN KEY (`course_id`) REFERENCES `M_COURSES` (`id`);

ALTER TABLE `T_CHAPTERS` ADD FOREIGN KEY (`course_id`) REFERENCES `M_COURSES` (`id`);

ALTER TABLE `T_LECTURES` ADD FOREIGN KEY (`chapter_id`) REFERENCES `T_CHAPTERS` (`id`);

ALTER TABLE `T_QUIZS` ADD FOREIGN KEY (`lecture_id`) REFERENCES `T_LECTURES` (`id`);

ALTER TABLE `T_ORDER_LIST` ADD FOREIGN KEY (`student_id`) REFERENCES `M_STUDENTS` (`id`);

ALTER TABLE `T_ORDER_LIST` ADD FOREIGN KEY (`course_id`) REFERENCES `M_COURSES` (`id`);

ALTER TABLE `T_ORDER_LIST` ADD FOREIGN KEY (`instructor_id`) REFERENCES `M_INSTRUCTORS` (`id`);

ALTER TABLE `T_COURSE_REVIEW_RATES` ADD FOREIGN KEY (`course_id`) REFERENCES `M_COURSES` (`id`);

ALTER TABLE `T_COURSE_REVIEW_RATES` ADD FOREIGN KEY (`student_id`) REFERENCES `M_STUDENTS` (`id`);

ALTER TABLE `T_STUDENT_PURCHASED_COURSES` ADD FOREIGN KEY (`student_id`) REFERENCES `M_STUDENTS` (`id`);

ALTER TABLE `T_STUDENT_PURCHASED_COURSES` ADD FOREIGN KEY (`course_id`) REFERENCES `M_COURSES` (`id`);

ALTER TABLE `T_STUDENT_WHISHLIST` ADD FOREIGN KEY (`student_id`) REFERENCES `M_STUDENTS` (`id`);

ALTER TABLE `T_STUDENT_WHISHLIST` ADD FOREIGN KEY (`course_id`) REFERENCES `M_COURSES` (`id`);

ALTER TABLE `T_STUDENT_CART` ADD FOREIGN KEY (`student_id`) REFERENCES `M_STUDENTS` (`id`);

ALTER TABLE `T_STUDENT_CART` ADD FOREIGN KEY (`course_id`) REFERENCES `M_COURSES` (`id`);

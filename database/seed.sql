-- L.I.M.E development seed data
-- Test-only credentials. Do not reuse these passwords in production.

USE lime_db;

INSERT IGNORE INTO `institution` (`institution_id`, `institution_name`, `type`, `country`) VALUES
  (1, 'University of Cape Town', 'University', 'South Africa'),
  (2, 'False Bay TVET College', 'TVET', 'South Africa'),
  (3, 'Stellenbosch University', 'University', 'South Africa');

INSERT IGNORE INTO `skill` (`skill_id`, `skill_name`, `category`) VALUES
  (1, 'PHP', 'Programming'),
  (2, 'MySQL', 'Database'),
  (3, 'Java', 'Programming'),
  (4, 'HTML', 'Frontend'),
  (5, 'CSS', 'Frontend'),
  (6, 'JavaScript', 'Frontend');

-- Password: Student123!
INSERT IGNORE INTO `user` (`user_id`, `email`, `password`, `role`) VALUES
  (1001, 'student.test@lime.local', '$2y$12$Z9sGq0LwK.Ez/oYhVasB0et0mhigVbvjifD8TCh8y1.MJIWSOWR3S', 'student');

INSERT IGNORE INTO `student` (`student_id`, `user_id`, `institution_id`, `first_name`, `surname`, `student_id_number`, `verification_status`) VALUES
  (1001, 1001, 1, 'Test', 'Student', 'TEST-STU-001', 'Verified');

-- Password: Company123!
INSERT IGNORE INTO `user` (`user_id`, `email`, `password`, `role`) VALUES
  (1002, 'company.test@lime.local', '$2y$12$wxodkPGZKIaBBb5UG6AYUuRJiL7r4Utxur8PMZnmCpRdSTVRBQ5jG', 'company');

INSERT IGNORE INTO `company` (`company_id`, `user_id`, `name`, `registration_num`, `official_email`, `industry`, `verification_status`) VALUES
  (1001, 1002, 'LIME Test Company', 'TEST-REG-001', 'company.test@lime.local', 'Technology', 'Approved');

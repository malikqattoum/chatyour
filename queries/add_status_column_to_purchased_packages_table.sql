ALTER TABLE gr_purchased_packages
ADD COLUMN status ENUM('pending', 'completed') NOT NULL DEFAULT 'pending';
CREATE TABLE gr_followers (
	follow_id BIGINT NOT NULL,
	from_user_id BIGINT NOT NULL,
	to_user_id BIGINT NOT NULL,
	relation_status INTEGER NOT NULL,
	created_on DATETIME NOT NULL,
	updated_on DATETIME NOT NULL
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_0900_ai_ci;
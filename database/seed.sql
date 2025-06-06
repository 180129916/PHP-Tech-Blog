-- Insert admin user
INSERT INTO users (username, password, email) VALUES 
('admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin@example.com');

-- Insert some categories
INSERT INTO categories (name, slug, description) VALUES 
('PHP', 'php', 'PHP programming articles'),
('JavaScript', 'javascript', 'JavaScript programming articles'),
('Web Development', 'web-development', 'Web development tutorials');

-- Insert some tags
INSERT INTO tags (name, slug) VALUES 
('Tutorial', 'tutorial'),
('Tips', 'tips'),
('Best Practices', 'best-practices');

-- Insert a sample post
INSERT INTO posts (title, slug, content, excerpt, status, user_id, category_id) VALUES 
('Getting Started with PHP', 'getting-started-with-php', 
'This is a sample post content. It can be much longer in real posts.',
'Learn the basics of PHP programming',
'published',
1, 1);

-- Link post with tags
INSERT INTO post_tag (post_id, tag_id) VALUES 
(1, 1),
(1, 2); 
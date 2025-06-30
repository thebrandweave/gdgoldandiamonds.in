-- Drop existing tables if they exist
DROP TABLE IF EXISTS youtube_links;
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS subscribers;
DROP TABLE IF EXISTS faqs;
DROP TABLE IF EXISTS popups;
DROP TABLE IF EXISTS social_media_links;
DROP TABLE IF EXISTS testimonials;
DROP TABLE IF EXISTS collection_items;
DROP TABLE IF EXISTS collections;
DROP TABLE IF EXISTS trending_collections;

-- Table to store trending collections
CREATE TABLE trending_collections (
    collection_id INT AUTO_INCREMENT PRIMARY KEY,
    collection_name VARCHAR(255) NOT NULL,
    collection_image_url VARCHAR(255) NOT NULL,
    sort_order INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert test data for trending collections
INSERT INTO trending_collections (collection_name, collection_image_url, sort_order) VALUES
('Bridal Collection', 'bridal_collection.jpg', 1),
('Diamond Sets', 'diamond_sets.jpg', 2),
('Gold Necklaces', 'gold_necklaces.jpg', 3);

-- Table to store general collections
CREATE TABLE collections (
    collection_id INT AUTO_INCREMENT PRIMARY KEY,
    collection_name VARCHAR(255) NOT NULL,
    collection_image_url VARCHAR(255) NOT NULL,
    sort_order INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert test data for collections
INSERT INTO collections (collection_name, collection_image_url, sort_order) VALUES
('Wedding Collection', 'wedding_collection.jpg', 1),
('Diamond Jewelry', 'diamond_jewelry.jpg', 2),
('Gold Bangles', 'gold_bangles.jpg', 3),
('Pearl Sets', 'pearl_sets.jpg', 4),
('Antique Collection', 'antique_collection.jpg', 5);

-- Table to store items within collections
CREATE TABLE collection_items (
    item_id INT AUTO_INCREMENT PRIMARY KEY,
    collection_id INT NOT NULL,
    item_name VARCHAR(255) NOT NULL,
    item_image_url VARCHAR(255) NOT NULL,
    item_description TEXT,
    original_price DECIMAL(10, 2) NOT NULL,
    selling_price DECIMAL(10, 2) NOT NULL,
    sort_order INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (collection_id) REFERENCES collections(collection_id)
);

-- Insert test data for collection items
INSERT INTO collection_items (collection_id, item_name, item_image_url, item_description, original_price, selling_price, sort_order) VALUES
(1, 'Royal Wedding Set', 'royal_wedding_set.jpg', 'Exquisite wedding set with diamonds and gold', 150000.00, 135000.00, 1),
(1, 'Bridal Necklace', 'bridal_necklace.jpg', 'Traditional bridal necklace with intricate design', 200000.00, 180000.00, 2),
(2, 'Diamond Pendant', 'diamond_pendant.jpg', 'Elegant diamond pendant with 18k gold chain', 75000.00, 67500.00, 1),
(2, 'Diamond Ring', 'diamond_ring.jpg', 'Classic solitaire diamond ring', 50000.00, 45000.00, 2),
(3, 'Gold Bangles Set', 'gold_bangles_set.jpg', 'Set of 4 traditional gold bangles', 120000.00, 108000.00, 1);

-- Table to store customer testimonials
CREATE TABLE testimonials (
    testimonial_id INT AUTO_INCREMENT PRIMARY KEY,
    customer_name VARCHAR(255) NOT NULL,
    feedback TEXT NOT NULL,
    rating INT CHECK (rating BETWEEN 1 AND 5),
    customer_image_url VARCHAR(255),
    sort_order INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert test data for testimonials
INSERT INTO testimonials (customer_name, feedback, rating, customer_image_url, sort_order) VALUES
('Priya Sharma', 'Amazing quality and service! The wedding collection is stunning.', 5, 'customer1.jpg', 1),
('Rahul Patel', 'Best jewelry store in town. Very professional staff.', 5, 'customer2.jpg', 2),
('Anita Desai', 'Beautiful designs and reasonable prices.', 4, 'customer3.jpg', 3);

-- Table to store social media links
CREATE TABLE social_media_links (
    id INT AUTO_INCREMENT PRIMARY KEY,
    platform_name VARCHAR(50) NOT NULL,
    link_url VARCHAR(255) NOT NULL,
    sort_order INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert test data for social media links
INSERT INTO social_media_links (platform_name, link_url, sort_order) VALUES
('Facebook', 'https://facebook.com/liyasgold', 1),
('Instagram', 'https://instagram.com/liyasgold', 2),
('Twitter', 'https://twitter.com/liyasgold', 3),
('WhatsApp', 'https://wa.me/917349739580', 4);

-- Table to store pop-up details
CREATE TABLE popups (
    popup_id INT AUTO_INCREMENT PRIMARY KEY,
    popup_image_url VARCHAR(255) NOT NULL,
    title VARCHAR(255) NOT NULL,
    link_url VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert test data for popups
INSERT INTO popups (popup_image_url, title, link_url) VALUES
('summer_sale.jpg', 'Summer Collection Sale', '/collections.php'),
('wedding_special.jpg', 'Wedding Season Special', '/wedding-collection.php');

-- Table to store FAQs
CREATE TABLE faqs (
    faq_id INT AUTO_INCREMENT PRIMARY KEY,
    question TEXT NOT NULL,
    answer TEXT NOT NULL,
    sort_order INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert test data for FAQs
INSERT INTO faqs (question, answer, sort_order) VALUES
('What are your business hours?', 'We are open Monday to Saturday from 10 AM to 8 PM.', 1),
('Do you offer customization services?', 'Yes, we offer custom jewelry design services. Please visit our store for consultation.', 2),
('What payment methods do you accept?', 'We accept cash, credit/debit cards, and UPI payments.', 3);

-- Table to store subscriber information
CREATE TABLE subscribers (
    subscriber_id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    subscribed_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status ENUM('active', 'inactive') DEFAULT 'active'
);

-- Insert test data for subscribers
INSERT INTO subscribers (email, status) VALUES
('customer1@example.com', 'active'),
('customer2@example.com', 'active'),
('customer3@example.com', 'inactive');

-- admin users table:
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Insert test data for admin users
INSERT INTO users (fullname, email, password) VALUES
('Admin User', 'admin@liyasgold.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'), -- password: password
('Manager', 'manager@liyasgold.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'); -- password: password

CREATE TABLE youtube_links (
    id INT AUTO_INCREMENT PRIMARY KEY,
    yt_link VARCHAR(255) NOT NULL,           -- Column to store the YouTube link
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Column to store the creation date
    sort_order INT DEFAULT 0                 -- Column for sorting order
);

-- Insert test data for YouTube links
INSERT INTO youtube_links (yt_link, sort_order) VALUES
('https://youtube.com/watch?v=video1', 1),
('https://youtube.com/watch?v=video2', 2),
('https://youtube.com/watch?v=video3', 3);
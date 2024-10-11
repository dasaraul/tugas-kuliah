CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(255),
    unique_key VARCHAR(50)
);

CREATE TABLE tugas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_tugas VARCHAR(255),
    mata_kuliah VARCHAR(255),
    file_tugas VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Users Table
CREATE TABLE Users (
    id CHAR(36) PRIMARY KEY UNIQUE NOT NULL,
    username NVARCHAR(255) UNIQUE NOT NULL,
    email NVARCHAR(255) UNIQUE NOT NULL,
    email_verified_at TIMESTAMP NULL,
    password NVARCHAR(255) NOT NULL,
    role ENUM('admin', 'user', 'writer') DEFAULT 'user',
    avatar NVARCHAR(255) NULL,
    bio TEXT NULL,
    status ENUM('active', 'banned', 'deleted') DEFAULT 'active',
    remember_token NVARCHAR(255) NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL
);

-- Artists Table
CREATE TABLE Artists (
    id CHAR(36) PRIMARY KEY UNIQUE NOT NULL,
    real_name NVARCHAR(255) NOT NULL,
    artist_name NVARCHAR(255) NOT NULL,
    bio TEXT NULL,
    artist_avatar NVARCHAR(255) NULL,
    artist_cover NVARCHAR(255) NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL
);

-- Albums Table
CREATE TABLE Albums (
    id CHAR(36) PRIMARY KEY UNIQUE NOT NULL,
    title NVARCHAR(255) NOT NULL,
    artist_id CHAR(36),
    release_date DATE NULL,
    album_type ENUM('single', 'ep', 'album') NOT NULL,
    album_cover NVARCHAR(255) NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL,
    FOREIGN KEY (artist_id) REFERENCES Artists(id) ON DELETE CASCADE
);

-- Songs Table
CREATE TABLE Songs (
    id CHAR(36) PRIMARY KEY UNIQUE NOT NULL,
    title NVARCHAR(255) NOT NULL,
    album_id CHAR(36),
    duration INT NULL,
    y_link NVARCHAR(255) NULL,
    s_link NVARCHAR(255) NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL,
    FOREIGN KEY (album_id) REFERENCES Albums(id) ON DELETE CASCADE
);

-- Categories Table
CREATE TABLE Categories (
    id CHAR(36) PRIMARY KEY UNIQUE NOT NULL,
    name NVARCHAR(255) NOT NULL UNIQUE,
    description TEXT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Magazine Posts Table
CREATE TABLE Magazine_Posts (
    id CHAR(36) PRIMARY KEY UNIQUE NOT NULL,
    title NVARCHAR(255) NOT NULL,
    content LONGTEXT NOT NULL,
    thumbnail NVARCHAR(255) NULL,
    status ENUM('public', 'pending', 'deleted') DEFAULT 'pending',
    category_id CHAR(36),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL,
    FOREIGN KEY (category_id) REFERENCES Categories(id) ON DELETE SET NULL
);

-- Music Votes Table
CREATE TABLE Music_Votes (
    id CHAR(36) PRIMARY KEY UNIQUE NOT NULL,
    song_id CHAR(36),
    user_id CHAR(36),
    rating INT CHECK (rating BETWEEN 1 AND 5),
    comment TEXT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL,
    FOREIGN KEY (song_id) REFERENCES Songs(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES Users(id) ON DELETE CASCADE
);

-- Magazine Post Reviews Table
CREATE TABLE Magazine_Post_Reviews (
    id CHAR(36) PRIMARY KEY UNIQUE NOT NULL,
    post_id CHAR(36),
    user_id CHAR(36),
    rating INT CHECK (rating BETWEEN 1 AND 5),
    comment TEXT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL,
    FOREIGN KEY (post_id) REFERENCES Magazine_Posts(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES Users(id) ON DELETE CASCADE
);

-- Playlist Categoies Table
CREATE TABLE Playlist_Categories (
    id CHAR(36) PRIMARY KEY UNIQUE NOT NULL,
    name NVARCHAR(255) NOT NULL,
    description NVARCHAR(255) NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL
);

-- Playlists Table
CREATE TABLE Playlists (
    id CHAR(36) PRIMARY KEY UNIQUE NOT NULL,
    title NVARCHAR(255) NOT NULL,
    description TEXT NULL,
    category_id CHAR(36) NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL,
    FOREIGN KEY (category_id) REFERENCES Playlist_Categories(id) ON DELETE CASCADE
);

-- Playlist Songs Table
CREATE TABLE Playlist_Songs (
    id CHAR(36) PRIMARY KEY UNIQUE NOT NULL,
    playlist_id CHAR(36),
    song_id CHAR(36),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (playlist_id) REFERENCES Playlists(id) ON DELETE CASCADE,
    FOREIGN KEY (song_id) REFERENCES Songs(id) ON DELETE CASCADE
);

-- Artist Song Table
CREATE TABLE Artist_Song (
    id CHAR(36) PRIMARY KEY UNIQUE NOT NULL,
    artist_id CHAR(36),
    song_id CHAR(36),
    role ENUM('singer', 'composer', 'producer'),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (artist_id) REFERENCES Artists(id) ON DELETE CASCADE,
    FOREIGN KEY (song_id) REFERENCES Songs(id) ON DELETE CASCADE
);

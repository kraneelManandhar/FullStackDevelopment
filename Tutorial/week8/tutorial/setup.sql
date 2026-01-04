CREATE DATABASE movies;

USE movies;

CREATE TABLE director (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    best_movie VARCHAR(255) NOT NULL
);

INSERT INTO director (name, best_movie) VALUES
('Denis Villeneuve', 'Dune'),
('Wes Anderson', 'The Grand Budapest Hotel'),
('David Fincher', 'Fight Club'),
('Bong Joon-ho', 'Parasite'),
('Greta Gerwig', 'Lady Bird'),
('Hayao Miyazaki', 'Spirited Away'),
('Coen Brothers', 'No Country for Old Men'),
('Paul Thomas Anderson', 'There Will Be Blood'),
('Taika Waititi', 'Jojo Rabbit'),
('Jordan Peele', 'Get Out'),
('Alejandro González Iñárritu', 'Birdman'),
('Damien Chazelle', 'La La Land'),
('Sofia Coppola', 'Lost in Translation'),
('Yorgos Lanthimos', 'The Favourite');

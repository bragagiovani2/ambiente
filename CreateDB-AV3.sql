CREATE DATABASE av3;
USE av3;

CREATE TABLE Contato (
		id INTEGER AUTO_INCREMENT PRIMARY KEY,
		nome VARCHAR(30) NOT NULL,
		sobrenome VARCHAR(30) NOT NULL,
		telefone VARCHAR(15) NOT NULL,
		email VARCHAR(75) NOT NULL);

INSERT INTO Contato (nome,sobrenome,telefone,email)
		VALUES ('Carlos','Silva','(51) 986121286','carlos.silva@gmail.com');

# Testar se o banco esta OK
SELECT * FROM Contato;

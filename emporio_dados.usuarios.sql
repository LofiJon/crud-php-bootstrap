CREATE TABLE `emporio_dados`.`usuarios` ( 
        `id` INT NOT NULL AUTO_INCREMENT , 
        `nome` VARCHAR(100) NOT NULL ,
        `endereco` VARCHAR(100) NOT NULL ,
        `email` VARCHAR(50) NOT NULL ,
        `senha` VARCHAR(30) NOT NULL ,
        PRIMARY KEY (`id`)) ENGINE = InnoDB;
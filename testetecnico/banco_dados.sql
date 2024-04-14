-- Criar tabela `orders`
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_user_id` int(11) DEFAULT NULL,
  `order_total` int(11) DEFAULT NULL,
  `order_date` datetime DEFAULT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Inserir dados na tabela `orders`
INSERT INTO `orders` (`order_id`, `order_user_id`, `order_total`, `order_date`) VALUES
    (1, 2, 2000, '2021-01-05 10:34:25'),
    (2, 4, 8000, '2021-01-06 04:42:36'),
    (5, 5, 5000, '2021-01-06 23:57:21'),
    (6, 1, 2000, '2021-01-09 12:17:03'),
    (7, 5, 10000, '2021-02-01 14:04:00');

-- Criar tabela `user`
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) DEFAULT NULL,
  `user_address` varchar(50) DEFAULT NULL,
  `user_city` varchar(50) DEFAULT NULL,
  `user_country` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`user_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Inserir dados na tabela `user`
INSERT INTO `user` (`user_id`, `user_name`, `user_address`, `user_city`, `user_country`) VALUES
    (1, 'Sheldon Cooper', 'Street 101, APT 4A', 'Pasadena', 'USA'),
    (2, 'Leonard Hofstadter', 'Street 101, APT 4A', 'Pasadena', 'USA'),
    (3, 'Penny', 'Street 101, APT A3', 'Pasadena', 'USA'),
    (4, 'Howard Wolowitz', 'Street 256', 'Toronto', 'USA'),
    (5, 'Rajesh Koothrappali', 'Av. Gandhi, 542', 'Mumbai', 'India');

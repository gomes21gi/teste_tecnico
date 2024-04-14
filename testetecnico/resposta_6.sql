SELECT DATE_FORMAT(orders.order_date, '%Y-%m') AS mes_ano, SUM(orders.order_total) AS total_vendas
FROM `user`
JOIN orders ON `user`.user_id = orders.order_user_id
WHERE `user`.user_id IN (1, 3, 5)
GROUP BY mes_ano;

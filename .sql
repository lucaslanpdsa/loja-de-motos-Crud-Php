CREATE TABLE crud-php.products (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  image VARCHAR(255) NOT NULL,
  price DECIMAL(10,2) NOT NULL,
);

INSERT INTO crud-php.products (id, name, image, price) VALUES
(1, 'Biz 125', 'https://www.honda.com.br/motos/sites/hda/files/2024-08/honda-biz-125-ex-design_0.webp', 15000.00),
(3, 'CG 160 Start', 'https://www.honda.com.br/motos/sites/hda/files/2025-01/honda-cg-160-start-diferencial-design.webp', 18000.00),
(4, 'Pop 110i ES', 'https://www.honda.com.br/motos/sites/hda/files/2024-04/mulher-tirando-foto-selfie-com-a-pop-110i-es.webp', 11000.00),
(5, 'CBR 1000RR-R FIREBLADE SP', 'https://www.honda.com.br/motos/sites/hda/files/2023-01/desktop-moto-honda-cbr-1000rr-r-fireblade-sp-2023-vermelho-grand-prix-00.webp', 189174.00),
(6, 'NXR 160 Bros ABS', 'https://www.honda.com.br/motos/sites/hda/files/2024-08/imagem-home-honda-nxr-bros-160-abs-lateral-cinza.webp', 21820.00);
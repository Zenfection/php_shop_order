-- category
INSERT INTO `tb_category` 
(`id_category`, `title`, `image_url`) 
VALUES
    (1, "Mứt", "mut.jpg"),
    (2, "Bánh", "banh.jpg"),
    (3, "Kẹo", "keo.jpg"),
    (4, "Khô", "kho.jpg");

-- product
-- mut
INSERT INTO `tb_product` 
(`id_product`, `name`, `description`, `price`, `ranking`, `picture`, `discount`, `quantity`,`id_category`) 
VALUES
(1, "Mứt Dừa", "Mứt được làm từ 100% dừa", 1.8, 4, "mut_1.jpg", 0, 6, 1),
(2, "Mứt Chuối", "Mứt được làm từ 100% chuối", 2.2, 6, "mut_2.jpg", 10, 9, 1),
(3, "Mứt Gừng", "Mứt được làm từ 100% gừng", 1.2, 9, "mut_3.jpg", 5, 9, 1),
(4, "Mứt Bưởi", "Mứt được làm từ 100% bưởi", 1.6, 2, "mut_4.jpg", 10, 6, 1);

-- banh
INSERT INTO `tb_product` 
(`id_product`, `name`, `description`, `price`, `ranking`, `picture`, `discount`, `quantity`,`id_category`) 
VALUES
(5, "Bánh Thèo Lèo", "Giòn giòn cay cay, hợp khẩu vị với bất kì ai. Thành phần: bột gạo, bột mì, nước mắm, ớt...", 3, 4, "banh_1.jpg", 0, 20, 2),
(6, "Bánh Tai Heo", "Hình dạng giống tai heo, giòn ngon mọi lứa tuổi đều thích", 2.5, 2, "banh_2.jpg", 0, 7, 2),
(7, "Bánh Pía", "Bánh mềm, nhân nhiều, da mỏng, phản phất hương thơm của nhân khoai môn/ đậu xanh, vị ngọt thanh, nhẹ nhàng không gắt cổ.", 5, 1, "banh_3.jpg", 5, 2, 2),
(8, "Bánh Gạo", "Da em trắng trẻo nõn nà, người mà ăn thử phải là mê luôn", 0.9, 2, "banh_4.jpg", 0, 1, 2);

-- keo
INSERT INTO `tb_product` 
(`id_product`, `name`, `description`, `price`, `ranking`, `picture`, `discount`, `quantity`,`id_category`) 
VALUES
(9, "Kẹo Bốn Mùa", "Hương vị nho, cam, vải, dâu", 1, 5, "keo_1.jpg", 10, 6, 3),
(10, "Kẹo Chuối", "Kẹo mang hương vị chuối đậm đà", 1.1, 2, "keo_2.jpg", 5, 15, 3),
(11, "Kẹo Dẻo", "Kẹo mềm mềm, dai dai, từ các hỗn hợp như đường, bơ, sữa,… ", 2.8, 5, "keo_3.jpg", 20, 16, 3),
(12, "Kẹo Cu Đơ", "Kẹo Cu Đơ là một loại kẹo lạc đặc sản của tỉnh Hà Tĩnh", 2.4, 2, "keo_4.jpg", 30, 4, 3);

-- kho
INSERT INTO `tb_product` 
(`id_product`, `name`, `description`, `price`, `ranking`, `picture`, `discount`, `quantity`,`id_category`) 
VALUES
(13, "Khô Gà", "Thơm ngon giòn cay", 6, 2, "kho_1.jpg", 30, 4, 4),
(14, "Khô Bò", "Bò khô ngon dai, hương vị đậm đà, ngọt tự nhiên, hàng chất giá lại mềm. Ship toàn quốc", 25, 1, "kho_2.jpg", 30, 12, 4),
(15, "Khô Heo", "Hương vị hấp dẫn, cay cay đánh thức vị giác làm ai ăn vào đều muốn ăn thêm.", 12, 7, "kho_3.jpg", 30, 23, 4),
(16, "Khô Mực", "Khô mực ngon loại 1 cao cấp, đóng gói hút chân không", 40, 3, "kho_4.jpg", 30, 9, 4);
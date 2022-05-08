-- category
INSERT INTO `tb_category` 
(`id_category`, `title`, `image`, `active`) 
VALUES
    ("mut","Mứt", "mut.jpg", 1),
    ("banh","Bánh", "banh.jpg", 1),
    ("keo","Kẹo", "keo.jpg", 1),
    ("kho","Khô", "kho.jpg", 1);

-- product
INSERT INTO `tb_product` 
(`name`, `description`, `price`, `ranking`, `image`, `discount`, `quantity`,`id_category`) 
VALUES
("Mứt Dừa", "Mứt được làm từ 100% dừa", 1.8, 4, "mut_1.jpg", 0, 6, "mut"),
("Mứt Chuối", "Mứt được làm từ 100% chuối", 2.2, 6, "mut_2.jpg", 10, 9, "mut"),
("Mứt Gừng", "Mứt được làm từ 100% gừng", 1.2, 9, "mut_3.jpg", 5, 9, "mut"),
("Mứt Bưởi", "Mứt được làm từ 100% bưởi", 1.6, 2, "mut_4.jpg", 10, 6, "mut"),
("Bánh Thèo Lèo", "Giòn giòn cay cay, hợp khẩu vị với bất kì ai. Thành phần: bột gạo, bột mì, nước mắm, ớt...", 3, 4, "banh_1.jpg", 0, 20, "banh"),
("Bánh Tai Heo", "Hình dạng giống tai heo, giòn ngon mọi lứa tuổi đều thích", 2.5, 2, "banh_2.jpg", 0, 7, "banh"),
("Bánh Pía", "Bánh mềm, nhân nhiều, da mỏng, phản phất hương thơm của nhân khoai môn/ đậu xanh, vị ngọt thanh, nhẹ nhàng không gắt cổ.", 5, 1, "banh_3.jpg", 5, 2, "banh"),
("Bánh Gạo", "Da em trắng trẻo nõn nà, người mà ăn thử phải là mê luôn", 0.9, 2, "banh_4.jpg", 0, 1, "banh"),
("Kẹo Bốn Mùa", "Hương vị nho, cam, vải, dâu", 1, 5, "keo_1.jpg", 10, 6, "keo"),
("Kẹo Chuối", "Kẹo mang hương vị chuối đậm đà", 1.1, 2, "keo_2.jpg", 5, 15, "keo"),
("Kẹo Dẻo", "Kẹo mềm mềm, dai dai, từ các hỗn hợp như đường, bơ, sữa,… ", 2.8, 5, "keo_3.jpg", 20, 16, "keo"),
("Kẹo Cu Đơ", "Kẹo Cu Đơ là một loại kẹo lạc đặc sản của tỉnh Hà Tĩnh", 2.4, 2, "keo_4.jpg", 30, 4, "keo"),
("Khô Gà", "Thơm ngon giòn cay", 6, 2, "kho_1.jpg", 30, 4, "kho"),
("Khô Bò", "Bò khô ngon dai, hương vị đậm đà, ngọt tự nhiên, hàng chất giá lại mềm. Ship toàn quốc", 25, 1, "kho_2.jpg", 30, 12, "kho"),
("Khô Heo", "Hương vị hấp dẫn, cay cay đánh thức vị giác làm ai ăn vào đều muốn ăn thêm.", 12, 7, "kho_3.jpg", 30, 23, "kho"),
("Khô Mực", "Khô mực ngon loại 1 cao cấp, đóng gói hút chân không", 40, 3, "kho_4.jpg", 30, 9, "kho");

-- customer
INSERT INTO `tb_user` 
(`username`, `fullname`, `email`, `password`, `phone`, `address`)
VALUES
("kietgolx65234", "Lê Tuấn Kiệt", "kietgolx65234@gmail.com", "e10adc3949ba59abbe56e057f20f883e", "1023456789","3/2 Đại học Cần Thơ"),
("user1", "Nguyễn Văn A", "user1@gmail.com", "e10adc3949ba59abbe56e057f20f883e", "0123456789","Hẻm 1, Nguyễn Văn Linh"),
("user2", "Nguyễn Văn B", "user2@gmail.com", "e10adc3949ba59abbe56e057f20f883e", "1123456789","Hẻm 2, Nguyễn Văn Linh"),
("user3", "Nguyễn Văn C", "user3@gmail.com", "e10adc3949ba59abbe56e057f20f883e", "2123456789","Hẻm 3, Nguyễn Văn Linh"),
("user4", "Nguyễn Văn D", "user4@gmail.com", "e10adc3949ba59abbe56e057f20f883e", "3123456789","Hẻm 4, Nguyễn Văn Linh"),
("user5", "Nguyễn Văn E", "user5@gmail.com", "e10adc3949ba59abbe56e057f20f883e", "4123456789","Hẻm 5, Nguyễn Văn Linh"),
("user6", "Nguyễn Văn F", "user6@gmail.com", "e10adc3949ba59abbe56e057f20f883e", "5123456789","Hẻm 6, Nguyễn Văn Linh"),
("user7", "Nguyễn Văn G", "user7@gmail.com", "e10adc3949ba59abbe56e057f20f883e", "6123456789","Hẻm 7, Nguyễn Văn Linh"),
("user8", "Lê Văn A", "user8@gmail.com", "e10adc3949ba59abbe56e057f20f883e", "7123456789","Hẻm 8, Nguyễn Văn Linh"),
("user9", "Lê Văn B", "user9@gmail.com", "e10adc3949ba59abbe56e057f20f883e", "8123456789","Hẻm 9, Nguyễn Văn Linh"),
("user10", "Lê Văn C", "user10@gmail.com", "e10adc3949ba59abbe56e057f20f883e", "9123456789","Hẻm 10, Nguyễn Văn Linh");

INSERT INTO `tb_cart`
(`username`, `id_product`, `amount`)
VALUES
("kietgolx65234", "1", 2),
("kietgolx65234", "2", 3),
("kietgolx65234", "3", 1);
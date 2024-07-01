-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 01, 2024 lúc 10:58 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `khoaluan`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chucvu`
--

CREATE TABLE `chucvu` (
  `idchucvu` int(11) NOT NULL,
  `tenchucvu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chucvu`
--

INSERT INTO `chucvu` (`idchucvu`, `tenchucvu`) VALUES
(1, 'Quản lý '),
(2, 'Thuyết minh'),
(3, 'Tạp vụ'),
(4, 'Bảo vệ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dkthamquan`
--

CREATE TABLE `dkthamquan` (
  `idtq` int(11) NOT NULL,
  `hoten` varchar(50) NOT NULL,
  `sdt` varchar(10) NOT NULL,
  `diachi` varchar(100) NOT NULL,
  `email` text NOT NULL,
  `tendoan` varchar(100) NOT NULL,
  `ngaythamquan` date NOT NULL,
  `soluong` int(11) NOT NULL,
  `ghichu` text NOT NULL,
  `trangthai` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `dkthamquan`
--

INSERT INTO `dkthamquan` (`idtq`, `hoten`, `sdt`, `diachi`, `email`, `tendoan`, `ngaythamquan`, `soluong`, `ghichu`, `trangthai`) VALUES
(15, 'yen', '2102154896', 'trà cú', 'xuyennguyen21012001@gmail.com', 'thpt chuyên Trà Cú ', '2024-09-19', 10, 'thắp hương', 'đã duyệt');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichtruc`
--

CREATE TABLE `lichtruc` (
  `idtruc` int(11) NOT NULL,
  `ngaytruc` date NOT NULL,
  `id` int(11) DEFAULT NULL,
  `idnhanvien` int(11) NOT NULL,
  `trangthai` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `lichtruc`
--

INSERT INTO `lichtruc` (`idtruc`, `ngaytruc`, `id`, `idnhanvien`, `trangthai`) VALUES
(1, '2024-06-19', 1, 19, ''),
(4, '2024-06-20', 1, 5, ''),
(7, '2024-06-19', 1, 30, 'Phân công'),
(8, '2024-06-25', NULL, 19, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhomto`
--

CREATE TABLE `nhomto` (
  `idnhomto` int(11) NOT NULL,
  `tento` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nhomto`
--

INSERT INTO `nhomto` (`idnhomto`, `tento`) VALUES
(1, 'Tổ nghiệp vụ'),
(2, 'Tô văn phòng'),
(3, 'Tổ quản lý tổng thể'),
(6, 'Tổ vệ sinh'),
(7, 'Tổ trồng cây');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phancong`
--

CREATE TABLE `phancong` (
  `idpc` int(11) NOT NULL,
  `idnhanvien` int(11) NOT NULL,
  `idtruc` int(11) NOT NULL,
  `id` int(11) DEFAULT NULL,
  `trangthai` text NOT NULL,
  `nguoitruccu` text DEFAULT NULL,
  `lydo` text DEFAULT NULL,
  `nguoiduyet` text DEFAULT NULL,
  `ngayduyet` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phancong`
--

INSERT INTO `phancong` (`idpc`, `idnhanvien`, `idtruc`, `id`, `trangthai`, `nguoitruccu`, `lydo`, `nguoiduyet`, `ngayduyet`) VALUES
(7, 30, 1, 1, 'Đã duyệt HĐ', 'Nguyễn Trúc Linh ', 'công việc ', 'Nguyễn Thanh Trúc', '2024-06-26'),
(11, 30, 4, 3, 'Đã duyệt HĐ', 'Lê Hiếu Thảo ', 'bận', 'Nguyễn Thanh Trúc', '2024-06-24'),
(12, 19, 4, 1, 'Phân công', '', '', '', '2024-06-15'),
(18, 19, 8, NULL, 'Phân công', '', '', '', '2024-07-24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sukien`
--

CREATE TABLE `sukien` (
  `id` int(11) NOT NULL,
  `tensukien` varchar(100) NOT NULL,
  `ngaybatdau` date NOT NULL,
  `ngayketthuc` date NOT NULL,
  `noidung` text NOT NULL,
  `file` text NOT NULL,
  `ngaydang` date NOT NULL,
  `idnhanvien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sukien`
--

INSERT INTO `sukien` (`id`, `tensukien`, `ngaybatdau`, `ngayketthuc`, `noidung`, `file`, `ngaydang`, `idnhanvien`) VALUES
(1, 'Tìm hiểu nét văn hóa lịch sử', '2024-03-09', '2024-03-15', 'Lưu bút tại Đền thờ Bác Hồ vào năm 1991, Đại tướng Võ Nguyên Giáp đã viết: “Đền thờ Bác Hồ, biểu tượng bất diệt, tấm lòng sắt son của nhân dân Nam bộ đối với Chủ tịch Hồ Chí Minh vĩ đại”. Trong hai cuộc kháng chiến chống Pháp và chống Mỹ, Long Đức là vùng đất thép được bao bọc bởi 3 con sông Long Bình, Ba Trường, Cổ Chiên ở hướng Đông, Tây và Bắc. Theo cách nhìn của các nhà quân sự, đây là địa bàn “một bề giặc lấn, ba bề sông ngăn”. Cách Long Đức 4.000m đường chim bay là trung tâm đầu não của ngụy quyền và cách 1.500m là căn cứ quân sự hiện đại, kiên cố của Mỹ với cả hệ thống sân bay, các loại máy bay chiến đấu. Long Đức cũng là căn cứ cách mạng bao vây đầu não địch, bàn đạp để quân dân ta tấn công vào sào huyệt của địch. Vì vậy, Long Đức trở thành trung tâm càn quét và bắn phá, cái gai mà Mỹ - ngụy không yên nếu chưa nhổ được.', './file/VENGUON.pdf', '2024-03-02', 4),
(3, 'Lễ quốc khánh 2/9', '2024-08-31', '2024-09-02', 'Để tỏ lòng tưởng nhớ đến Bác Hồ, nhiều phụ nữ ở Trà Vinh đã treo ảnh Bác và dịp 2/9 hàng năm cùng nhau tổ chức giỗ Bác rất trang trọng. Tuy mỗi nơi có cách làm khác nhau, nhưng đều thể hiện tình cảm thiêng liêng, tỏ lòng thành tưởng nhớ đối với Bác Hồ kính yêu.</p><p>Đặc biệt, vào ngày 2/9 hàng năm, cán bộ, hội viên phụ nữ phối hợp với chính quyền địa phương tổ chức lễ giỗ Bác rất trang trọng. Không chỉ có người dân trong ấp, nhiều người trong xã và những địa phương lân cận đến thắp hương tưởng nhớ, kính viếng. Người dân ai có gì góp nấy, có người góp bó củi, có người mang gà, vịt, trứng, rau, có người thì mang trái cây, hoa tươi… để tổ chức nấu những mâm cơm.</p><p>Mừng ngày độc lập, mừng đất nước phát triển phồn thịnh, người dân Trà Vinh luôn có Bác trong tim mình, những tình cảm này thể hiện đạo lý uống nước nhớ nguồn của dân tộc Việt Nam. Lễ giỗ Bác đã thực sự trở thành truyền thống văn hóa tốt đẹp, mang tính nhân văn sâu sắc của người dân nói chung và phụ nữ Trà Vinh nói riêng. Đây cũng là dịp để thế hệ trẻ địa phương hiểu biết hơn những công lao vĩ đại của Bác đối với đất nước, qua đó giáo dục truyền thống cách mạng, vun đắp tình yêu quê hương đất nước, tình yêu đối với Bác Hồ kính yêu</p>', './file/VENGUON.pdf', '2024-08-01', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `idnhanvien` int(11) NOT NULL,
  `hoten` varchar(50) NOT NULL,
  `ngaysinh` date NOT NULL,
  `gioitinh` varchar(50) NOT NULL,
  `sodienthoai` varchar(11) NOT NULL,
  `idnhomto` int(11) NOT NULL,
  `idchucvu` int(11) NOT NULL,
  `email` text NOT NULL,
  `hinhanh` text NOT NULL,
  `matkhau` text NOT NULL,
  `quyen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`idnhanvien`, `hoten`, `ngaysinh`, `gioitinh`, `sodienthoai`, `idnhomto`, `idchucvu`, `email`, `hinhanh`, `matkhau`, `quyen`) VALUES
(4, 'Nguyễn Thanh Trúc', '2002-02-25', 'Nữ', '0768745924', 2, 1, 'thanhchut357@gmail.com', './hinhanh/cucno.jpg', '123', 0),
(5, 'Lê Hiếu Thảo ', '2001-05-05', 'Nam', '0763487921', 1, 2, 'bongthao2694@gmail.com', 'hinhanh/pc2.jpg', '457', 1),
(17, 'Nguyễn Cẩm Xuyênn', '2001-06-21', 'Nữ', '0768894858', 3, 1, 'xuyennguyen2201@gmail.com', 'hinhanh/pc1.jpg', 'pt210116', 0),
(18, 'Lâm Hương Trà', '2005-05-17', 'Nữ', '0768899137', 1, 2, 'huongtra170586@gail.com', 'hinhanh/pc4.jpg', '1705', 1),
(19, 'Nguyễn Trúc Linh ', '2004-02-13', 'Nữ', '0124697856', 1, 2, 'tl0606@gmail.com', 'hinhanh/pc5.jpg', '456', 1),
(20, 'Hoàng Bảo Lâm', '2000-07-09', 'Nam', '13685792', 1, 2, 'baolam56@gmail.com', 'hinhanh/pc1.jpg', '972', 1),
(30, 'Nguyễn Thị Mỹ Yến ', '2002-09-26', 'Nam', '768895222', 2, 2, 'yenyen09@gmail.com', './hinhanh/pc3.jpg', '269', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tintuc`
--

CREATE TABLE `tintuc` (
  `idtintuc` int(11) NOT NULL,
  `tieude` text NOT NULL,
  `noidung` text NOT NULL,
  `ngaydang` date NOT NULL,
  `hinhanhtt` text NOT NULL,
  `noibat` int(11) NOT NULL,
  `idnhanvien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tintuc`
--

INSERT INTO `tintuc` (`idtintuc`, `tieude`, `noidung`, `ngaydang`, `hinhanhtt`, `noibat`, `idnhanvien`) VALUES
(6, 'Chủ tịch tỉnh ghé thăm đền thờ', 'Lưu bút tại Đền thờ Bác Hồ vào năm 1991, Đại tướng Võ Nguyên Giáp đã viết: “Đền thờ Bác Hồ, biểu tượng bất diệt, tấm lòng sắt son của nhân dân Nam bộ đối với Chủ tịch Hồ Chí Minh vĩ đại”. Trong hai cuộc kháng chiến chống Pháp và chống Mỹ, Long Đức là vùng đất thép được bao bọc bởi 3 con sông Long Bình, Ba Trường, Cổ Chiên ở hướng Đông, Tây và Bắc. Theo cách nhìn của các nhà quân sự, đây là địa bàn “một bề giặc lấn, ba bề sông ngăn”. Cách Long Đức 4.000m đường chim bay là trung tâm đầu não của ngụy quyền và cách 1.500m là căn cứ quân sự hiện đại, kiên cố của Mỹ với cả hệ thống sân bay, các loại máy bay chiến đấu. Long Đức cũng là căn cứ cách mạng bao vây đầu não địch, bàn đạp để quân dân ta tấn công vào sào huyệt của địch. Vì vậy, Long Đức trở thành trung tâm càn quét và bắn phá, cái gai mà Mỹ - ngụy không yên nếu chưa nhổ được.', '2024-04-29', '', 0, 4),
(7, 'Ngày Giải phóng miền Nam 30/4', 'Ngày Giải phóng miền Nam 30/4 là ngày lễ mang ý nghĩa lịch sử trọng đại, thể hiện cho ý chí quật cường, sức mạnh đoàn kết hay truyền thống dựng nước, giữ nước của nhân dân ta. Đây cũng là dịp để gợi nhớ lại con cháu về sự hi sinh của đồng bào dân tộc đã ngã xuống vì độc lập, tự do và phát triển', '2024-06-15', '', 0, 4),
(8, 'Quốc khánh 2/9', '2/9/1945 còn là ngày Bác Hồ trịnh trọng tuyên bố trước toàn thể nhân dân Việt Nam và thế giới về sự ra đời của nhà nước Việt Nam Dân chủ Cộng hòa (Cộng hòa xã hội chủ nghĩa Việt Nam).  Lễ kỷ niệm Quốc khánh ngày 2/9 giúp cho con cháu tưởng nhớ được hy sinh vất vả của những người đi trước để khai sinh ra đất nước Việt Nam. Bên cạnh đó, đây cũng là ngày để mọi người ghi nhớ lời thề thiêng liêng của Chủ tịch Hồ Chí Minh “toàn thể dân tộc Việt Nam quyết đem tất cả tinh thần và lực lượng, tính mạng và của cải để giữ vững quyền tự do, độc lập ấy', '2024-06-17', '', 0, 4),
(9, 'Tuổi trẻ Trà Vinh báo công dâng Bác', '<p>S&aacute;ng ng&agrave;y 17/5, tại khu lịch sử Đền thờ Chủ tịch Hồ Ch&iacute; (x&atilde; Long Đức,th&agrave;nh phố Tr&agrave; Vinh),&nbsp; Tỉnh Đo&agrave;n Tr&agrave; Vinh tổ chức lễ b&aacute;o c&ocirc;ng d&acirc;ng B&aacute;c gắn với ra mắt c&ocirc;ng tr&igrave;nh số h&oacute;a Di t&iacute;ch lịch sử Đền&nbsp;thờ Chủ tịch Hồ Ch&iacute; Minh....</p>\r\n', '2024-06-24', '', 1, 4),
(10, 'Bí thư Trung ương Đoàn dâng hương đền thờ Bác tại Trà Vinh', '<p>Đo&agrave;n c&ocirc;ng t&aacute;c của Trung ương Đo&agrave;n do anh Nguyễn Ngọc Lương, B&iacute; thư Trung ương&nbsp;Đo&agrave;n, Chủ tịch Hội đồng Đội Trung ương l&agrave;m trưởng đo&agrave;n c&ugrave;ng tuổi trẻ tỉnh Tr&agrave; Vinh d&acirc;ng hương tưởng nhớ B&aacute;c Hồ k&iacute;nh y&ecirc;u tại đền thời B&aacute;c ở x&atilde; Long Đức (TP Tr&agrave; Vinh)....</p>\r\n', '2024-06-22', '', 1, 4),
(11, 'Tập thể Đoàn thể tỉnh Trà Vinh dự lễ kỉ niệm ngày 19/05', '<p>Đo&agrave;n thể tỉnh c&ugrave;ng một số đo&agrave;n vi&ecirc;n đến dự lễ kỉ niệm, tặng v&ograve;ng hoa, b&aacute;o c&aacute;o th&agrave;nh t&iacute;ch nh&acirc;n dịp&nbsp;kỉ niệm ng&agrave;y sinh của người</p>\r\n', '2024-05-20', '', 1, 4);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chucvu`
--
ALTER TABLE `chucvu`
  ADD PRIMARY KEY (`idchucvu`);

--
-- Chỉ mục cho bảng `dkthamquan`
--
ALTER TABLE `dkthamquan`
  ADD PRIMARY KEY (`idtq`);

--
-- Chỉ mục cho bảng `lichtruc`
--
ALTER TABLE `lichtruc`
  ADD PRIMARY KEY (`idtruc`),
  ADD KEY `id` (`id`),
  ADD KEY `idnhanvien` (`idnhanvien`);

--
-- Chỉ mục cho bảng `nhomto`
--
ALTER TABLE `nhomto`
  ADD PRIMARY KEY (`idnhomto`);

--
-- Chỉ mục cho bảng `phancong`
--
ALTER TABLE `phancong`
  ADD PRIMARY KEY (`idpc`),
  ADD KEY `idnhanvien` (`idnhanvien`),
  ADD KEY `idtruc` (`idtruc`),
  ADD KEY `id` (`id`);

--
-- Chỉ mục cho bảng `sukien`
--
ALTER TABLE `sukien`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idnhanvien` (`idnhanvien`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`idnhanvien`),
  ADD KEY `idnhomto` (`idnhomto`),
  ADD KEY `idchucvu` (`idchucvu`);

--
-- Chỉ mục cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`idtintuc`),
  ADD KEY `idnhavien` (`idnhanvien`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chucvu`
--
ALTER TABLE `chucvu`
  MODIFY `idchucvu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `dkthamquan`
--
ALTER TABLE `dkthamquan`
  MODIFY `idtq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `lichtruc`
--
ALTER TABLE `lichtruc`
  MODIFY `idtruc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `nhomto`
--
ALTER TABLE `nhomto`
  MODIFY `idnhomto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `phancong`
--
ALTER TABLE `phancong`
  MODIFY `idpc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `sukien`
--
ALTER TABLE `sukien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `idnhanvien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `idtintuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `lichtruc`
--
ALTER TABLE `lichtruc`
  ADD CONSTRAINT `lichtruc_ibfk_1` FOREIGN KEY (`id`) REFERENCES `sukien` (`id`),
  ADD CONSTRAINT `lichtruc_ibfk_2` FOREIGN KEY (`idnhanvien`) REFERENCES `taikhoan` (`idnhanvien`);

--
-- Các ràng buộc cho bảng `phancong`
--
ALTER TABLE `phancong`
  ADD CONSTRAINT `phancong_ibfk_1` FOREIGN KEY (`idnhanvien`) REFERENCES `taikhoan` (`idnhanvien`),
  ADD CONSTRAINT `phancong_ibfk_2` FOREIGN KEY (`idtruc`) REFERENCES `lichtruc` (`idtruc`),
  ADD CONSTRAINT `phancong_ibfk_3` FOREIGN KEY (`id`) REFERENCES `sukien` (`id`);

--
-- Các ràng buộc cho bảng `sukien`
--
ALTER TABLE `sukien`
  ADD CONSTRAINT `sukien_ibfk_1` FOREIGN KEY (`idnhanvien`) REFERENCES `taikhoan` (`idnhanvien`);

--
-- Các ràng buộc cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD CONSTRAINT `taikhoan_ibfk_1` FOREIGN KEY (`idnhomto`) REFERENCES `nhomto` (`idnhomto`),
  ADD CONSTRAINT `taikhoan_ibfk_2` FOREIGN KEY (`idchucvu`) REFERENCES `chucvu` (`idchucvu`);

--
-- Các ràng buộc cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  ADD CONSTRAINT `tintuc_ibfk_1` FOREIGN KEY (`idnhanvien`) REFERENCES `taikhoan` (`idnhanvien`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

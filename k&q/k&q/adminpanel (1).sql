-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 28, 2022 lúc 09:16 AM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `adminpanel`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bo_mon`
--

CREATE TABLE `bo_mon` (
  `id_bo_mon` int(11) UNSIGNED NOT NULL,
  `ten_bomon` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `gioithieu_bm` longtext COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `bo_mon`
--

INSERT INTO `bo_mon` (`id_bo_mon`, `ten_bomon`, `gioithieu_bm`) VALUES
(1, 'PHP', 'PHP - viết tắt hồi quy của \"Hypertext Preprocessor\", là một ngôn ngữ lập trình kịch bản được chạy ở phía server nhằm sinh ra mã html trên client. PHP đã trải qua rất nhiều phiên bản và được tối ưu hóa cho các ứng dụng web, với cách viết mã rõ rãng, tốc độ nhanh, dễ học nên PHP đã trở thành một ngôn ngữ lập trình web rất phổ biến và được ưa chuộng.   PHP chạy trên môi trường Webserver và lưu trữ dữ liệu thông qua hệ quản trị cơ sở dữ liệu nên PHP thường đi kèm với Apache, MySQL và hệ điều hành Linux (LAMP).  Apache là một phần mềm web server có nhiệm vụ tiếp nhận request từ trình duyệt người dùng sau đó chuyển giao cho PHP xử lý và gửi trả lại cho trình duyệt. MySQL cũng tương tự như các hệ quản trị cơ sở dữ liệu khác (Postgress, Oracle, SQL server...) đóng vai trò là nơi lưu trữ và truy vấn dữ liệu. Linux: Hệ điều hành mã nguồn mở được sử dụng rất rộng rãi cho các webserver. Thông thường các phiên bản được sử dụng nhiều nhất là RedHat Enterprise Linux, Ubuntu...  PHP hoạt động như thế nào?  Khi người sử dụng gọi trang PHP, Web Server sẽ triệu gọi PHP Engine để thông dịch dịch trang PHP và trả kết quả cho người dùng như hình bên dưới.'),
(2, 'Tin Học Văn Phòng', '1. Tin học văn phòng là gì?\r\n\r\nTin học văn phòng là một nhánh trong ngành CÔNG NGHỆ THÔNG TIN, chú trọng đến khả năng xử lý các công việc thường được sử dụng trong văn phòng như: thao tác với văn bản, bảng tính, trình chiếu. Tin học văn phòng gồm bộ công cụ Microsoft Office liên quan như Microsoft Office Word, Microsoft Office Excel, Microsoft Office Power Point, Microsoft Office Access, … với rất nhiều các phiên bản khác nhau nhưng về cơ bản là phục vụ cho công việc văn phòng nói chung.\r\n\r\n2. Bạn đã bao giờ nghĩ mình hoặc ai đó là kẻ “khuyết tật IT” chưa?\r\n\r\nTrong thời đại công nghệ thông tin (IT – Information Technology) phát triển đến mức không thể tin nổi như thế này thì đã phát sinh một khái niệm “KHUYẾT TẬT IT” ->  để chỉ về những người mù tịt về công nghệ thông tin. Thực chất, Tin học văn phòng cũng chỉ là một nhánh nhỏ trong ngành công nghệ thông tin vô cùng bao la rộng lớn. Thành thạo về Tin học văn phòng cũng giống như “xóa mù chữ” cho mọi người trong lĩnh vực công nghệ thông tin vậy.\r\n\r\nKhi có ai đó nhắc tới các cụm từ “Tin học văn phòng”,  “Tin học văn phòng cơ bản“, chắc ai cũng sẽ nghĩ tới bộ sản phẩm ứng dụng Word – Excel – Powerpoint, chúng mang những tính năng ứng dụng rất rộng rãi và được áp dụng phổ biến trong việc thực hiện các công việc văn phòng, giấy tờ hiện nay. Đứng trước những tính năng đa dạng của bộ 3 ứng dụng này, không ít người lần đầu tiên tiếp cận đã bị CHOÁNG và loay hoay không biết mình phải tìm hiểu và nắm vững những điều gì trước tiên.\r\n3. Đôi nét về Tin học văn phòng – kỹ năng KHÔNG THỂ THIẾU\r\n\r\n– 90% các nhà quản lý trên thế giới đều sử dụng excel hàng ngày để quản trị.\r\n\r\n– Phần lớn mọi người không nhận thức được tầm quan trọng của Microsoft Office Word – Excel -Powerpoint  vì chỉ sử dụng được 5 – 10% công dụng thật sự của bộ ứng dụng này.\r\n\r\n– Theo một cuộc điều tra nổi tiếng ở Mỹ, hơn 80% ứng viên tham gia cho rằng kỹ năng Tin học văn phòng Word Excel Powerpoint là một KỸ NĂNG KHÔNG THỂ THIẾU nơi công sở.\r\n\r\n4. Các kỹ năng cơ bản sử dụng vi tính văn phòng, làm quen bàn phím máy tính\r\n\r\n+ Làm quen với thao tác đánh mười ngón,, đặt vị trí ngón tay, vị trí các dấu trong văn bản (,.:’?~^@!-+ …..)\r\n\r\n+ Công dụng của các phím chức năng : Enter, Backspce, Ins,…\r\n\r\n+ Sử dụng các phím tắt (shortcut keys) trên bàn phím máy tính: Copy – Ctrl + C, paste – Crtl + V, print – Ctrl + P, auto correct – Alt + T + A,…\r\n4.1. Kỹ năng Word trong Tin học văn phòng\r\n\r\n Microsoft Word, còn được biết đến với tên khác là Winword, là một công cụ soạn thảo văn bản khá phổ biển hiện nay của công ty phần mềm nổi tiếng Microsoft. Nó cho phép người dùng làm việc với văn bản thô (text), các hiệu ứng như phông chữ, màu sắc, cùng với hình ảnh đồ họa (graphic) và nhiều hiệu ứng đa phương tiện khác (multimedia) như âm thanh, video khiến cho việc soạn thảo văn bản được thuận tiện hơn. Ngoài ra cũng có các công cụ như kiểm tra chính tả, ngữ pháp của nhiều ngôn ngữ khác nhau để hỗ trợ người sử dụng. Các phiên bản của Word thường lưu tên tập tin với đuôi là .doc với các bản Office trước bản 2007 hay .docx đối với Office 2007, 2010 trở đi. Hầu hết các phiên bản của Word đều có thể mở được các tập tin văn bản thô (.txt) và cũng có thể làm việc với các định dạng khác, chẳng hạn như xử lý siêu văn bản (.html), thiết kế trang web.\r\n\r\n+ Nhập liệu văn bản, đinh dạng đoạn văn, văn bản: Gõ đúng văn phạm tiếng Việt, font, cỡ chữ, màu chữ\r\n\r\n+ Lập, chèn và định dạng bảng: Bullet, numbering, căn đoạn, line-spacing, tab, chèn thêm dòng, cột, trộn (merge), tách (split), thay đổi đường viền bảng…\r\n\r\n+ Chèn hình ảnh, vẽ hình khối, sơ đồ: Shape, smart art, clip art\r\n\r\n+ Chèn ký tự: Symbol; Chèn link (hyperlink), ghi chú (footnote)\r\n\r\n+ Thiết lập in: khổ giấy, lề in, header, footer, đánh số trang văn bản\r\n\r\n+ Trộn văn bản: Mail merge\r\n\r\n+ Bảo mật file: Đặt mật khẩu bảo vệ cho file word\r\n4.2. Kỹ năng Excel trong Tin học văn phòng\r\n\r\nLà chương trình xử lý bảng tính. Bảng tính của Excel cũng bao gồm nhiều ô được tạo bởi các dòng và cột, việc nhập dữ liệu và lập công thức tính toán trong Excel cũng có những điểm tương tự, tuy nhiên Excel có nhiều tính năng ưu việt và có giao diện rất thân thiện với người dùng, chủ yếu là thiết lập, xử lý bảng và tính toán theo các hàm.\r\n\r\n+ Tạo bảng tính, Định dạng dữ liệu bảng tính: Định dạng số, định dạng bảng, trộn (merge), xóa cột (split)….\r\n\r\n+ Định dạng tự động: Định dạng tự động theo yêu cầu (theo tỉnh, ngày tháng năm,…)\r\n\r\n+ Sử dụng hàm số thông dụng: If, Vlookup, Hlookup, Sum, Sumif, Average, Countif, Min, Max, Year, Month, Day, Now….\r\n\r\n+ Sử dụng lọc dữ liệu (Filter) : lọc theo yêu cầu\r\n\r\n+ Vẽ Biểu đồ: Chart\r\n\r\n+ Tạo Link: Hyperlink\r\n\r\n+ Thiết Lập in, bảo mật file: Page setup, Đặt Password cho file\r\n\r\n+ Và còn rất nhiều ứng dụng khác. Ví dụ như thế này chẳng hạn:\r\n\r\n4.3.  Kỹ năng PowerPoint trong Tin học văn phòng\r\n\r\nGồm bộ soạn thảo và thiết lập hệ trình chiếu\r\n\r\n+ Chỉnh sửa, vẽ hình khối, biểu đồ trong PowerPoint: Shapes, Smart art, Chart\r\n\r\n+ Tạo link: Hyperlink\r\n\r\n+ Sử dụng các kiểu trình chiếu, thiết kế: Transition, Themes design\r\n\r\n+Tạo hiệu ứng amination\r\n\r\n+ Sử dụng slide master\r\n\r\n+ Bảo mật file\r\n\r\n+ Trình chiếu, xuất file sang định dạng PDF'),
(3, 'Java', 'Giới thiệu\r\nJava là một trong những ngôn ngữ lập trình hướng đối tượng. Nó được sử dụng trong phát triển phần mềm, trang web, game hay ứng dụng trên các thiết bị di động.\r\n\r\nJava được khởi đầu bởi James Gosling và bạn đồng nghiệp ở Sun MicroSystem năm 1991. Ban đầu Java được tạo ra nhằm mục đích viết phần mềm cho các sản phẩm gia dụng, và có tên là Oak.\r\n\r\nJava được phát hành năm 1994, đến năm 2010 được Oracle mua lại từ Sun MicroSystem.\r\n\r\nJava được tạo ra với tiêu chí “Viết (code) một lần, thực thi khắp nơi” (Write Once, Run Anywhere  – WORA). Chương trình phần mềm viết bằng Java có thể chạy trên mọi nền tảng (platform) khác nhau thông qua một môi trường thực thi với điều kiện có môi trường thực thi thích hợp hỗ trợ nền tảng đó.\r\nĐặc điểm của ngôn ngữ lập trình Java\r\nTương tự C++, hướng đối tượng hoàn toàn\r\nTrong quá trình tạo ra một ngôn ngữ mới phục vụ cho mục đích chạy được trên nhiều nền tảng, các kỹ sư của Sun MicroSystem muốn tạo ra một ngôn ngữ dễ học và quen thuộc với đa số người lập trình. Vì vậy họ đã sử dụng lại các cú pháp của C và C++.\r\n\r\nTuy nhiên, trong Java thao tác với con trỏ bị lược bỏ nhằm đảo bảo tính an toàn và dễ sử dụng hơn. Các thao tác overload, goto hay các cấu trúc như struct và union cũng được loại bỏ khỏi Java.\r\n\r\nĐộc lập phần cứng và hệ điều hành\r\nMột chương trình viết bằng ngôn ngữ Java có thể chạy tốt ở nhiều môi trường khác nhau. Gọi là khả năng “cross-platform”. Khả năng độc lập phần cứng và hệ điều hành được thể hiện ở 2 cấp độ là cấp độ mã nguồn và cấp độ nhị phân.\r\n\r\nỞ cấp độ mã nguồn: Kiểu dữ liệu trong Java nhất quán cho tất cả các hệ điều hành và phần cứng khác nhau. Java có riêng một bộ thư viện để hỗ trợ vấn đề này. Chương trình viết bằng ngôn ngữ Java có thể biên dịch trên nhiều loại máy khác nhau mà không gặp lỗi.\r\n\r\nỞ cấp độ nhị phân: Một mã biên dịch có thể chạy trên nhiều nền tảng khác nhau mà không cần dịch lại mã nguồn. Tuy nhiên cần có Java Virtual Machine để thông dịch đoạn mã này.\r\n\r\nNgôn ngữ thông dịch\r\nNgôn ngữ lập trình thường được chia ra làm 2 loại (tùy theo các hiện thực hóa ngôn ngữ đó) là ngôn ngữ thông dịch và ngôn ngữ biên dịch.\r\n\r\nThông dịch (Interpreter) : Nó dịch từng lệnh rồi chạy từng lệnh, lần sau muốn chạy lại thì phải dịch lại.\r\nBiên dịch (Compiler): Code sau khi được biên dịch sẽ tạo ra 1 file thường là .exe, và file .exe này có thể đem sử dụng lại không cần biên dịch nữa.\r\nNgôn ngữ lập trình Java thuộc loại ngôn ngữ thông dịch. Chính xác hơn, Java là loại ngôn ngữ vừa biên dịch vừa thông dịch. Cụ thể như sau\r\n\r\nKhi viết mã, hệ thống tạo ra một tệp .java. Khi biên dịch mã nguồn của chương trình sẽ được biên dịch ra mã byte code. Máy ảo Java (Java Virtual Machine) sẽ thông dịch mã byte code này thành machine code  (hay native code) khi nhận được yêu cầu chạy chương trình.\r\nƯu điểm : Phương pháp này giúp các đoạn mã viết bằng Java có thể chạy được trên nhiều nền tảng khác nhau. Với điều kiện là JVM có hỗ trợ chạy trên nền tảng này.\r\n\r\nNhược điểm : Cũng như các ngôn ngữ thông dịch khác, quá trình chạy các đoạn mã Java là chậm hơn các ngôn ngữ biên dịch khác (tuy nhiên vẫn ở trong một mức chấp nhận được).\r\n\r\nCơ chế thu gom rác tự động\r\nKhi tạo ra các đối tượng trong Java, JRE sẽ tự động cấp phát không gian bộ nhớ cho các đối tượng ở trên heap.\r\n\r\nVới ngôn ngữ như C \\ C++, bạn sẽ phải yêu cầu hủy vùng nhớ mà bạn đã  cấp phát, để tránh việc thất thoát vùng nhớ. Tuy nhiên vì một lý do nào đó, bạn không hủy một vài vùng nhớ, dẫn đến việc thất thoát và làm giảm hiệu năng chương trình.\r\n\r\nNgôn ngữ lập trình Java hỗ trợ cho bạn điều đó, nghĩa là bạn không phải  tự gọi hủy các vùng nhớ. Bộ thu dọn rác của Java sẽ theo vết các tài nguyên đã được cấp. Khi không có tham chiếu nào đến vùng nhớ, bộ thu dọn rác sẽ tiến hành thu hồi vùng nhớ đã được cấp phát.\r\n\r\nĐa luồng\r\nJava hỗ trợ lập trình đa tiến trình (multithread) để thực thi các công việc đồng thời. Đồng thời cũng cung cấp giải pháp đồng bộ giữa các tiến trình (giải pháp sử dụng priority…).\r\n\r\nTính an toàn và bảo mật\r\nTính an toàn\r\nNgôn ngữ lập trình Java yêu cầu chặt chẽ về kiểu dữ liệu.\r\n\r\nDữ liệu phải được khai báo tường minh.\r\n\r\nKhông sử dụng con trỏ và các phép toán với con trỏ.\r\n\r\nJava kiểm soát chặt chẽ việc truy nhập đến mảng, chuỗi. Không cho phép sử dụng các kỹ thuật tràn. Do đó các truy nhập sẽ không vượt quá kích thước của mảng hoặc chuỗi.\r\n\r\nQuá trình cấp phát và giải phóng bộ nhớ được thực hiện tự động.\r\n\r\nCơ chế xử lý lỗi giúp việc xử lý và phục hồi lỗi dễ dàng hơn.\r\n\r\nTính bảo mật\r\nJava cung cấp một môi trường quản lý chương trình với nhiều mức khác nhau.\r\n\r\nMức 1 : Chỉ có thể truy xuất dữ liệu cũng như phương phức thông qua giao diện mà lớp cung cấp.\r\n\r\nMức 2 : Trình biên dịch kiểm soát các đoạn mã sao cho tuân thủ các quy tắc của ngôn ngữ lập trình Java trước khi thông dịch.\r\n\r\nMức 3 : Trình thông dịch sẽ kiểm tra mã byte code xem các đoạn mã này có đảm bảo được các quy định, quy tắc trước khi thực thi.\r\n\r\nMức 4: Java kiểm soát việc nạp các lớp vào bộ nhớ để giám sát việc vi phạm giới hạn truy xuất trước khi nạp vào hệ thống.\r\n\r\nMáy ảo Java (JVM – Java Virtual Machine)\r\nĐể đảm bảo tính đa nền, Java sử dụng cơ chế Máy ảo của Java.\r\n\r\nByteCode là ngôn ngữ máy của Máy ảo Java tương tự như các lệnh nhị phân của các máy tính thực.\r\n\r\nMột chương trình sau khi được viết bằng ngôn ngữ Java (có phần mở rộng là .java) phải được biên dịch thành tập tin thực thi được trên máy ảo Java (có phần mở rộng là .class).  Tập tin thực thi này chứa các chỉ thị dưới dạng mã Bytecode mà máy ảo Java hiểu được phải làm gì.\r\n\r\nKhi thực hiện một chương trình, máy ảo Java lần lượt thông dịch các chỉ thị dưới dạng Bytecode thành các chỉ thị dạng nhị phân của máy tính thực và thực thi thực sự chúng trên máy tính thực (còn gọi là khả năng khả chuyển).\r\n\r\nMáy ảo thực tế đó là một chương trình thông dịch. Vì thế các hệ điều hành khác nhau sẽ có các máy ảo khác nhau. Để thực thi một ứng dụng của Java trên một hệ điều hành cụ thể, cần phải cài đặt máy ảo tương ứng cho hệ điều hành đó.\r\n\r\nJVM cung cấp môi trường thực thi cho chương trình Java (còn gọi là khả năng độc lập với nền).\r\n\r\nCó nhiều JVM cho các nền tảng khác nhau chẳng hạn như: Windows, Liux, và Mac.'),
(4, 'DocNet', 'Ngôn ngữ .NET là gì? Những kiến thức để bắt đầu với .NET Framework.\r\nITNavi01 Nov 2020 8065\r\n.Net là một trong những ngôn ngữ lập trình được đông đảo lập trình viên lựa chọn để trở thành ngôn ngữ “tiên quyết” của hệ điều hành Windows. Mặc dù phổ biến là vậy nhưng với những  Developer mới bước vào nghề vẫn còn khá bỡ ngỡ với loại ngôn ngữ lập trình này. Vậy nên, bài viết sau đây ITNavi sẽ giải đáp cho bạn đọc .Net là gì và cách để trở thành một lập trình viên .Net. Hãy  cùng theo dõi nhé!\r\n\r\nĐịnh nghĩa .Net là gì?\r\n.NET (hay  còn gọi Dot Net) là một Framework cho phép Developer sử dụng để thực hiện phát triển cho các website, ứng dụng. Nền tảng này được phát triển bởi  Microsoft và nó chủ yếu chạy trên hệ điều hành Microsoft Window. Bạn nên chú ý rằng, .NET không được xem là loại ngôn ngữ lập trình mà là nền tảng cho phép các ngôn ngữ lập trình khác như C# hoặc Java có thể sử dụng để thực hiện tạo nên các ứng dụng hoặc website trên Internet. \r\nCấu tạo của .NET chính là bộ code được viết sẵn bởi các lập trình viên hàng đầu của Microsoft. Những lập trình viên khác thường sử dụng nền tảng này nhằm mục đích phát triển ứng dụng, dịch vụ web một cách nhanh chóng hơn rất.\r\nMột số ngôn ngữ lập trình được ứng dụng trên nền tảng .NET bao gồm: C#, VB.Net,..\r\nMột số ưu điểm nổi bật của .NET\r\nNhư đã nhắc ở phía trên .NET là một trong những nền tảng được sử dụng phổ biến để hỗ trợ phát triển ứng dụng và website. Vậy những ưu điểm nổi bật của .Net là gì mà được nhiều lập trình viên lựa chọn đến vây?\r\n\r\n.Net có khả năng tương thích với đạt đa số các mã thực hiện cũng như lưu trữ của đối tượng. \r\n.Net có thể tạo ra sự nhất quán dành cho mọi trải nghiệm của nhà phát triển với các ứng dụng khác nhau ví dụ như: App web, App windows,..\r\n.Net tạo ra được những ứng dụng đơn giản dựa trên Web-based, Form-based dựa trên .NET framework.\r\nNet có khả năng xây dựng được toàn bộ thông tin liên lạc cũng như các tiêu chuẩn của ngành công nghiệp dựa vào những khả năng tích hợp của hầu hết các mã thuộc nền tảng .Net.\r\n.Net có thể cung cấp một môi trường thực thi với mục đích giải quyết các rắc rối, xung đột liên quan đến hiệu suất. Từ đó, thúc đẩy cho quá trình phát triển và triển khai cho mã an toàn. \r\nNgoài ra, .Net còn sở hữu vô số các điểm cộng khác như: rất đáng tin cậy nhờ có tính bảo mật cao, chi phí sẽ được giảm khi triển khai ứng dụng, ngôn ngữ sử dụng đa nền tảng,...\r\nThành phần của .NET Framework gồm những gì?\r\nĐể hiểu rõ hơn .Net là gì thì bạn đọc có thể tìm hiểu  rõ các thành phần của nó ngay sau đây: Class LanguageĐây là một lớp thư viện có tên là Framework Class Library (FCL).\r\n\r\nThư viện này có nhiệm vụ thực hiện các tương tác qua các ngôn ngữ lập trình khác nhau để thực hiện xây dựng ứng dụng. Và các thành phần đã được ứng dụng để xây dựng từ .NET framework là: \r\n\r\nASP.net: Với khả năng dựa vào nền tảng web để phát triển thêm các ứng dụng có khả năng chạy trên những trình duyệt thông dụng như: Chrome, Internet Explorer, Firefox hay Coccoc,v.v….\r\nWinForms: Nó có thể chạy trên end user machine, từ đó hình thành và phát triển các ứng dụng Form và điển hình nhất là Notepad.\r\nADO.Net: Các ứng dụng được phát triển trừ ADO.Net thường có khả năng tương tác tốt với các cơ sở dữ liệu của Microsoft SQL Server hoặc Oracle.\r\nClass Library\r\nCác lớp thư viện của .NET framework là một trong những hàm thường chứa các phương thức có khả năng phục vụ cho các mục tiêu cốt lõi khác. Trong số đó thì các vùng như: Microsoft.*. hoặc System. * được xem là các phương thức cốt lõi nhất.\r\nNhờ vậy, các phương thức cùng tên là Microsoft hoặc System đều có thể tham chiếu được ngay khi xuất hiện dấu * và nó bao gồm các khoảng trắng thể hiện sự tách biệt logic trong phương thức.\r\n\r\nClass CLR\r\nĐây là một trong những lớp sở hữu thời gian chạy ngôn ngữ chung giúp cho .NET Framework có thể thực thi được các chương trình đang có. Một số tính năng của Class CLR bao gồm: \r\nKhả năng loại bỏ các thành phần không còn cần thiết vẫn còn tồn tại. \r\nKhả năng xử lý những lỗi không mong muốn xảy ra ngay khi thực thi tại các môi trường CLR  khác.\r\nCó thể thực hiện những chương trình với các ngôn ngữ lập trình là C# hay VB.Net. Nhờ đó, quá trình này thường sẽ thông qua trình biên dịch cho các ngôn ngữ rồi tiến hành chạy thông qua Common Language Interpreter.\r\nMuốn làm lập trình viên .NET cần phải học những gì?\r\nLộ trình để trở thành một lập trình viên .Net thực thụ thì tố chất đầu tiên bạn cần có là không ngừng học hỏi. Ngoài ra, còn có khả năng phân tích logic, giải quyết vấn đề chính xác cũng như lựa chọn được thông tin phù hợp. Dưới đây là một số kỹ năng bạn cần trau dồi nếu như muốn nâng cao kiến thức về .NET framework: \r\n\r\nMột số điều cần phải thực hiện\r\nLựa chọn kỹ năng trong .NET  phù hợp nhất với bản thân và khám phá ra các kiến thức cần phải nắm bắt về nó. \r\nTìm hiểu và nghiên cứu về kỹ năng mà bạn muốn phát triển thông qua internet hoặc youtube. \r\nThử thực hiện một số dự án demo với kỹ năng mà bạn đã lựa chọn (nếu thành công thì đừng ngại áp dụng với công việc thực tế). \r\nNếu như  kỹ năng này đã thành thạo thì đừng quên rèn luyện kỹ năng tiếp theo nhé. \r\nMột số kỹ năng cần thiết trong .NET\r\n.NET Basics\r\nC#\r\n.NET\r\n .NET MVC\r\nSQL Server\r\nWCF\r\nVisual Studio\r\nJavaScript\r\njQuery\r\nCSS\r\nMột số kiến thức hỗ trợ cho kỹ năng trong .Net\r\nWeb API\r\nEntity Framework\r\nLINQ\r\nAngularJS\r\nNodeJS\r\nTìm hiểu về .NET Developer và lộ trình trở thành .Net Developer\r\nTìm hiểu về .Net Developer\r\n.NET Developer là gì? Lập trình viên .NET là người giữ nhiệm vụ tìm hiểu, phát triển cho các ứng dụng web dựa vào nền tảng .NET framework của Microsoft hoặc Apps của Windows. Cơ hội tìm kiếm việc làm của .NET Developer là vô cùng rộng mở bởi vì nền tảng Windows đang được xem là nền tảng cơ bản của nhiều ứng dụng hiện nay. \r\n\r\nNgoài ra, sự ra đời của .NET Core mang lại khả năng chạy trên nhiều nền tảng khác ngoài Windows với các mã nguồn mở. Từ đó, kéo theo sự tham gia của rất nhiều các doanh nghiệp giúp mở rộng nghiên cứu giúp các lập trình viên phát triển. Đây cũng chính là lý do mà .NET được nhiều lập trình viên theo đuổi đến vậy.\r\n\r\nLộ trình trở thành .Net Developer\r\nNếu đang là sinh viên thì đừng quên chuẩn bị cho bản thân nền tảng tư duy tốt từ những môn như: giải thuật, cấu trúc dữ liệu,... Nếu  là người chuyển ngành thì đừng quên các kiến thức nền tảng về C# và .NET. Lưu ý: Đừng quên chuẩn bị cho bản thân khả năng đọc hiểu tiếng  anh để quá trình đọc tài liệu cũng như phát hiện ra Bug được dễ dàng hơn nhé!Sau bước chuẩn bị thì bạn chỉ cần tiến vào lộ trình phát triển như sau:  \r\n\r\nBổ sung thật nhiều kiến thức liên quan đến cú pháp, .NET và thư  viện trong C#. \r\nBổ sung các kiến thức  để gia tăng khả năng thực thi cho cơ sở dữ liệu SQL. \r\nMở rộng  kiến thức về CSS, HTML, Javascript nếu muốn trở thành Web Developer nhé. \r\nHãy chú trọng học tập thêm ở những thư viện nâng cao là: Bootstrap và Jquery.\r\nTập làm việc với cơ sở dữ liệu SQL hoặc những  loại khai thác dựa vào những thư viện kết nối Entity Framework hoặc ADO.NET.\r\nTổng  kết\r\nNhư vậy, bài viết trên đây ITNavi đã chia sẻ đến bạn đọc đáp án của câu hỏi .NET là gì cũng như lộ trình để trở thành một lập trình viên .NET. Hiện nay, các lập trình viên  .NET đang được nhận mức lương trên 10 triệu cho những người có kinh nghiệm. Và nếu như bề dày kinh nghiệm của bạn lớn và năng lực làm việc cao thì con số đó có thể tăng lên đến  35t triệu/tháng. Đây là một con số đáng để cho bạn đầu tư  kiến thức để tạo dựng cho bản thân một công việc ổn định. Nếu có hứng thú với .NET Developer thì đừng ngại thử nhé! Chúc bạn sớm thành công với hoạch định công việc của mình.'),
(5, 'Lập Trình Cơ Sở Dữ Liệu', 'Tổng quan về cơ sở dữ liệu – Dữ liệu là gì Là các thông tin của đối tượng (người, vật, một khái niệm, sự việc…) được lưu trữ trên máy tính.  Dữ liệu được mô tả dưới nhiều dạng khác nhau (các ký tự, ký số, hình ảnh, ký hiệu, âm thanh…). Mỗi cách mô tả gắn với một ngữ nghĩa nào đó.  Dữ liệu về đối tượng có thể khác nhau, tùy thuộc vào ngữ cảnh. Ví dụ: dữ liệu về đối tượng sinh viên có thể khác nhau tùy vào mục đích quản lý:  Quản lý điểm: Tên, mã sinh viên, điểm môn 1, điểm môn 2, điểm môn 3. Trong khi đó quản lý nhân thân: Tên, địa chỉ, ngày sinh, quê quán, lớp  Tổng quan về cơ sở dữ liệu – Cơ sở dữ liệu (Database) Cơ sở dữ liệu (CSDL) là tập hợp dữ liệu được tổ chức có cấu trúc liên quan với nhau và được lưu trữ trong máy tính.  CSDL được thiết kế, xây dựng cho phép người dùng lưu trữ dữ liệu, truy xuất thông tin hoặc cập nhật dữ liệu.  CSDL được tổ chức có cấu trúc: Các dữ liệu được lưu trữ có cấu trúc thành các bản ghi (record), các trường dữ liệu (field). Các dữ liệu lưu trữ có mối quan hệ (relation) với nhau  CSDL được cấu trúc để dễ dàng truy cập, quản lý và cập nhật.\r\nTổng quan về cơ sở dữ liệu – Quản lý dữ liệu\r\nQuản lý dữ liệu là quản lý một số lượng lớn dữ liệu, bao gồm cả việc lưu trữ và cung cấp cơ chế cho phép Thao tác (thêm, sửa, xóa dữ liệu) và Truy vấn dữ liệu. Hai phương pháp quản lý dữ liệu: Hệ thống quản lý bằng file và Hệ thống quản lý bằng CSDL\r\n\r\nQuản lý dữ liệu bằng file\r\n\r\nDữ liệu được lưu trữ trong các file riêng biệt. Ví dụ: các chương trình lưu trữ thông tin bằng hệ thống các file dạng text.\r\n\r\nNhược điểm của việc quản lý bằng file:\r\n\r\nDư thừa và mâu thuẫn dữ liệu. \r\nKém hiệu quả trong truy xuất ngẫu nhiên hoặc xử lý đồng thời. \r\nDữ liệu lưu trữ rời rạc. \r\nGặp vấn đề về an toàn và bảo mật\r\nQuản lý dữ liệu bằng CSDL\r\nQuản lý dữ liệu bằng CSDL giúp dữ liệu được lưu trữ một cách hiệu quả và có tổ chức, cho phép quản lý dữ liệu nhanh chóng và hiệu quả.\r\n\r\nTổng quan về cơ sở dữ liệu – Các mô hình CSDL\r\nMô hình dữ liệu file\r\n\r\nCSDL dạng file phẳng thường là file kiểu văn bản chứa dữ liệu dạng bảng. Ví dụ một file phẳng thể hiện thông tin về Customer (Khách hàng) dưới dạng bảng của công ty Northwind Traders\r\nMô hình dữ liệu phân cấp\r\n\r\nTổ chức theo hình cây, mỗi nút biểu diễn một thực thể dữ liệu. Liên hệ dữ liệu thể hiện trên liên hệ giữa nút cha và nút con. Mỗi nút cha có thể có một hoặc nhiều nút con, nhưng mỗi nút con chỉ có thể có một nút cha.\r\nMô hình dữ liệu mạng\r\n\r\nCác file riêng biệt trong hệ thống file phẳng được gọi là các bản ghi . Tập hợp bản ghi cùng kiểu tạo thành một kiểu thực thể dữ liệu. Các kiểu thực thể kết nối với nhau thông qua mối quan hệ cha-con. Mô hình dữ liệu mạng biểu diễn bởi một đồ thị có hướng, và các mũi tên chỉ từ kiểu thực thể cha sang kiểu thực thể con.\r\nMô hình dữ liệu quan hệ\r\n\r\nTrong mô hình dữ liệu quan hệ, không có các liên kết vật lý. Dữ liệu được biểu diễn dưới dạng bảng với các hàng và các cột: CSDL là tập hợp các bảng (còn gọi là quan hệ). Mỗi hàng là một bản ghi (record), còn được gọi là bộ (tuple). Mỗi cột là một thuộc tính, còn được gọi là trường (field)\r\nMô hình dữ liệu hướng đối tượng\r\n\r\nMỗi đối tượng bao gồm các thuộc tính, phương thức (hành vi) của đối tượng. Các đối tượng trao đổi với nhau thông qua các phương thức. Một đối tượng có thể được sinh ra từ việc thừa kế từ đối tượng khác, nạp chồng (hay định nghĩa lại) phương thức của đối tượng khác…\r\nTổng quan về cơ sở dữ liệu – Hệ quản trị CSDL\r\nCác mô hình CSDL đề cập đến các hình thức tổ chức lưu trữ và truy cập dữ liệu. Hệ quản trị CSDL (DataBase Management System – DBMS) là các phần mềm giúp tạo các CSDL và cung cấp cơ chế lưu trữ, truy cập theo các mô hình CSDL.\r\n\r\nVí dụ: SQL Server, Microsoft Access, Oracle là các hệ quản trị CSDL điển hình cho mô hình quan hệ. IMS của IBM là hệ quản trị CSDL cho mô hình phân cấp. IDMS là hệ quản trị CSDL cho mô hình mạng\r\n\r\nNhững lợi ích DBMS mang lại\r\n\r\nQuản trị các CSDL và cung cấp giao diện truy cập để che dấu các đặc tính phức tạp về mặt cấu trúc tổ chức dữ liệu vật lý Hỗ trợ các ngôn ngữ giao tiếp. Ví dụ: Ngôn ngữ mô tả, định nghĩa dữ liệu – DDL. Ngôn ngữ thao tác dữ liệu – DML. Ngôn ngữ truy vấn dữ liệu có cấu trúc – SQL Có cơ chế an toàn, bảo mật cao\r\n\r\nHệ quản trị CSDL quan hệ (Relational DataBase Management System)\r\n\r\nRDMBS là một dạng DBMS được sử dụng phổ biến nhất, trong đó tất cả dữ liệu được tổ chức chặt chẽ dưới dạng các bảng dữ liệu. Tất cả các thao tác trên CSDL đều diễn ra trên các bảng.\r\n\r\n\r\nNgười dùng liên quan đến RDBMS\r\n\r\nNgười quản trị CSDL (DataBase Administrator), Người thiết kế CSDL (DataBase Designer), Người phân tích hệ thống (System Analyst), Người lập trình ứng dụng (Application Programmer), Người thiết kế và triển khai CSDL (DBMS Designer and Implementer), Người dùng cuối (End User).');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ca_hoc`
--

CREATE TABLE `ca_hoc` (
  `id_ca` int(11) UNSIGNED NOT NULL,
  `ten_ca` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `chitiet_ca` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `ca_hoc`
--

INSERT INTO `ca_hoc` (`id_ca`, `ten_ca`, `chitiet_ca`) VALUES
(1, 'A1', 'Thứ 2 - Thứ 4- Thứ 6 (8:00 - 10:00)'),
(2, 'A2', 'Thứ 2 - Thứ 4 - Thứ 6 (10:00 - 12:00)'),
(3, 'A3', 'Thứ 2 - Thứ 4 - Thứ 6 (14:00 - 16:00)'),
(4, 'A4', 'Thứ 2 - Thứ 4 - Thứ 6 (16:00 - 18:00)'),
(5, 'A5', 'Thứ 2 - Thứ 4 - Thứ 6 (18:00 - 20:00)'),
(9, 'B1', 'Thứ 3 - Thứ 5 - Thứ 7 (8:00 - 10:00)'),
(10, 'B2', 'Thứ 3 - Thứ 5 - Thứ 7 (10:00 - 12:00)'),
(11, 'B3', 'Thứ 3 - Thứ 5 - Thứ 7 (14:00 - 16:00)'),
(12, 'B4', 'Thứ 3 - Thứ 5 - Thứ 7 (16:00 - 18:00)'),
(13, 'B5', 'Thứ 3 - Thứ 5 - Thứ 7 (18:00 - 20:00)'),
(14, 'C1', 'Chủ Nhật (8:00 - 12:00)'),
(15, 'C2', 'Chủ Nhật (14:00 - 18:00)');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_lop_hoc`
--

CREATE TABLE `chi_tiet_lop_hoc` (
  `id_ct_lop` int(11) UNSIGNED NOT NULL,
  `id_hs` int(11) UNSIGNED NOT NULL,
  `id_lop` int(11) UNSIGNED NOT NULL,
  `thanhtoan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chuc_vu`
--

CREATE TABLE `chuc_vu` (
  `id_cv` int(11) UNSIGNED NOT NULL,
  `TenChucVu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `chuc_vu`
--

INSERT INTO `chuc_vu` (`id_cv`, `TenChucVu`) VALUES
(1, 'Quản Lý Hệ Thống'),
(2, 'Quản Lý Đào Tạo'),
(3, 'Nhân Viên Giáo Vụ'),
(4, 'Kế Toán'),
(5, 'Giảng Viên'),
(6, 'Học Viên');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cong_no`
--

CREATE TABLE `cong_no` (
  `id_congno` int(11) UNSIGNED NOT NULL,
  `id_hs` int(11) UNSIGNED NOT NULL,
  `id_lop` int(11) UNSIGNED NOT NULL,
  `hoc_phi` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `ngay_dk` varchar(10) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `han_tt` varchar(10) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `trang_thai` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ct_gv`
--

CREATE TABLE `ct_gv` (
  `id_ctgv` int(11) UNSIGNED NOT NULL,
  `id_gv` int(11) UNSIGNED NOT NULL,
  `id_bo_mon` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `ct_gv`
--

INSERT INTO `ct_gv` (`id_ctgv`, `id_gv`, `id_bo_mon`) VALUES
(1, 26, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gioi_thieu`
--

CREATE TABLE `gioi_thieu` (
  `id` int(11) NOT NULL,
  `Content` varchar(20000) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `video` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `gioi_thieu`
--

INSERT INTO `gioi_thieu` (`id`, `Content`, `img`, `video`) VALUES
(1, '<p><strong><a href=\"index.php\"><span style=\"color:blue\">Trung t&acirc;m tin học K&amp;Q</span></a></strong>&nbsp; Trung t&acirc;m tin học K&amp;Q l&agrave; trung t&acirc;m đặt uy t&iacute;n l&ecirc;n h&agrave;ng đầu, đảm bảo chất lượng đầu ra. Với đội ngũ nh&acirc;n vi&ecirc;n v&agrave; giảng vi&ecirc;n ưu t&uacute; ch&uacute;ng t&ocirc;i cam kết học vi&ecirc;n sẽ ho&agrave;n to&agrave;n h&agrave;i l&ograve;ng về c&aacute;c dịch vụ m&agrave; trung t&acirc;m mang lại. Trung t&acirc;m tin học K&amp;Q chuy&ecirc;n đ&agrave;o tạo c&aacute;c kh&oacute;a tin học văn ph&ograve;ng từ cơ bản đến n&acirc;ng cao c&ugrave;ng với đ&oacute; ch&uacute;ng t&ocirc;i cũng chuy&ecirc;n đ&agrave;o tạo c&aacute;c kh&oacute;a học lập tr&igrave;nh PHP,Java,C,C++,C#,... Mong c&aacute;c qu&yacute; học vi&ecirc;n sẽ tin tưởng v&agrave; chọn K&amp;Q đồng h&agrave;nh c&ugrave;ng c&aacute;c bạn. <span style=\"font-size:12pt\"> </span></p>\n\n<p>&nbsp;</p>\n\n<h3><img alt=\"Giới thiệu - Ảnh 2\" src=\"https://toplist.vn/images/800px/trung-tam-tin-hoc-ngoai-ngu-tri-thuc-154226.jpg\" style=\"display:block; margin-left:auto; margin-right:auto; width:50%\" title=\"Trung tâm ngoại ngữ tomato\" /></h3>\n\n<h3><span style=\"font-size:12pt\"><strong><span style=\"font-size:13.5pt\">9 l&yacute; do để bạn chọn trung t&acirc;m tin học </span></strong></span><span style=\"font-size:16px\"><strong>K&amp;Q</strong> </span><span style=\"font-size:12pt\"><strong><span style=\"font-size:13.5pt\">:</span></strong></span></h3>\n\n<p><span style=\"font-size:16px\"><strong>1</strong>. Mức học ph&iacute; của mỗi học vi&ecirc;n l&agrave; 1.500.000-5.000.000 một kh&oacute;a 3 th&aacute;ng.</span></p>\n\n<p><span style=\"font-size:16px\"><strong>2</strong>. Đi học tại Trung t&acirc;m được trang bị cơ sở vật chất, m&aacute;y t&iacute;nh đầy đủ cho tất cả học vi&ecirc;n(1 học vi&ecirc;n 1 m&aacute;y t&iacute;nh).</span></p>\n\n<p><span style=\"font-size:16px\"><strong>3</strong>. Tất cả c&aacute;c kh&oacute;a học tại Trung t&acirc;m tin học K&amp;Q bạn đều c&oacute; cơ hội tiếp x&uacute;c với đề thi qua c&aacute;c kh&oacute;a học tại trung t&acirc;m v&agrave; gi&uacute;p c&aacute;c học vi&ecirc;n c&oacute; thể n&acirc;ng cao kỹ năng tin học của bản th&acirc;n .</span></p>\n\n<p><span style=\"font-size:16px\"><strong>4</strong>. Tất cả c&aacute;c kh&oacute;a học tại Trung t&acirc;m tin học K&amp;Q bạn đều c&oacute; cơ hội tiếp x&uacute;c với đề thi qua c&aacute;c kh&oacute;a học tại trung t&acirc;m v&agrave; gi&uacute;p c&aacute;c học vi&ecirc;n c&oacute; thể n&acirc;ng cao kỹ năng tin học của bản th&acirc;n .</span></p>\n\n<p><span style=\"font-size:16px\"><strong>5</strong>. Trong qu&aacute; tr&igrave;nh học tập học vi&ecirc;n bận kh&ocirc;ng theo học được c&oacute; quyền bảo lưu thẻ học với c&aacute;c lớp kh&aacute;c với ca ph&ugrave; hợp thời hạn bảo lưu đến 1 năm.</span></p>\n\n<p><span style=\"font-size:16px\"><strong>6</strong>. Ho&agrave;n 100% học ph&iacute; cho buổi học đầu ti&ecirc;n: cam kết ho&agrave;n lại 100% học ph&iacute; ngay buổi học đầu ti&ecirc;n nếu học vi&ecirc;n cảm thấy kh&ocirc;ng ph&ugrave; hợp.</span></p>\n\n<p><span style=\"font-size:16px\"><strong>7</strong>. Đ&agrave;o tạo tin học văn ph&ograve;ng cho h&agrave;ng ng&agrave;n học vi&ecirc;n.</span></p>\n\n<p><span style=\"font-size:16px\"><strong>8</strong>. Nội dung chuy&ecirc;n tập trung v&agrave;o phần thực h&agrave;nh, gi&aacute;o tr&igrave;nh thực h&agrave;nh đầy đủ v&agrave; b&aacute;m s&aacute;t với nhu cầu của việc l&agrave;m.</span></p>\n\n<p><span style=\"font-size:16px\"><strong>9</strong>. C&oacute; nhiều ưu đ&atilde;i v&agrave; phần qu&agrave; hấp dẫn d&agrave;nh cho những học vi&ecirc;n đăng k&iacute; học theo nh&oacute;m.</span></p>\n\n<p style=\"text-align:center\"><span style=\"font-size:20px\"><strong>Ch&uacute;ng t&ocirc;i cam kết đảm bảo chất lượng học tập v&agrave; phục vụ khi c&aacute;c bạn đến với ch&uacute;ng t&ocirc;i!</strong></span></p>\n\n<p><span style=\"font-size:12pt\"><strong><span style=\"font-size:13.5pt\">C&aacute;c ưu đ&atilde;i khi đăng k&yacute; tại Trung t&acirc;m </span></strong></span><span style=\"font-size:16px\"><strong>K&amp;Q</strong> </span><span style=\"font-size:12pt\"><strong><span style=\"font-size:13.5pt\">:</span></strong></span></p>\n\n<p><span style=\"font-size:16px\">+ Được&nbsp;đăng k&yacute; học thử 1 - 2 buổi.</span></p>\n\n<p><span style=\"font-size:16px\">+&nbsp;Đăng k&yacute; v&agrave; đ&oacute;ng học ph&iacute; trước ng&agrave;y khai giảng được giảm&nbsp;5% học ph&iacute;.</span></p>\n\n<p><span style=\"font-size:16px\">+ Giới thiệu bạn b&egrave; người th&acirc;n đến trung t&acirc;m được giảm 10% học ph&iacute; tr&ecirc;n 1 người giới thiệu</span></p>\n\n<h3><span style=\"font-size:16px\"><strong>Th&ocirc;ng tin về lớp học v&agrave; thời gian học:</strong></span></h3>\n\n<p><span style=\"font-size:16px\">+ Mỗi lớp tối đa từ 25 đến 40 học vi&ecirc;n.</span></p>\n\n<p><span style=\"font-size:16px\">+ Thời gian học : S&aacute;ng, chiều hoặc tối ph&ugrave; hợp với học sinh, v&agrave; người đi l&agrave;m.</span></p>\n\n<p><span style=\"font-size:16px\"><strong>Mọi thắc mắc li&ecirc;n hệ:</strong>&nbsp;0877227202-0877227747</span></p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n', '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `history`
--

CREATE TABLE `history` (
  `id` int(11) UNSIGNED NOT NULL,
  `user` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `usertype` int(1) NOT NULL,
  `action` int(1) NOT NULL,
  `data` longtext COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `date` varchar(11) COLLATE utf8mb4_vietnamese_ci NOT NULL DEFAULT current_timestamp(),
  `time` varchar(8) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `history`
--

INSERT INTO `history` (`id`, `user`, `usertype`, `action`, `data`, `date`, `time`) VALUES
(25, 'Hồ Bảo Khangg', 1, 1, '', '21-03-2022', '16:00:26'),
(26, 'Hồ Bảo Khangg', 1, 2, '', '21-03-2022', '16:00:28'),
(27, 'Hồ Bảo Khangg', 1, 2, '', '21-03-2022', '16:36:07'),
(28, 'Nguyễn Anh Hậu', 2, 1, '', '21-03-2022', '16:36:09'),
(29, 'Nguyễn Anh Hậu', 2, 2, '', '21-03-2022', '16:36:11'),
(30, 'Hồ Thị Phương', 3, 1, '', '21-03-2022', '16:36:22'),
(31, 'Hồ Thị Phương', 3, 2, '', '21-03-2022', '16:36:25'),
(32, 'Hồ Bảo Khangg', 1, 1, '', '21-03-2022', '16:36:28'),
(33, 'Hồ Bảo Khangg', 1, 2, '', '21-03-2022', '17:11:28'),
(34, 'Hồ Bảo Khangg', 1, 1, '', '21-03-2022', '17:11:35'),
(35, 'Hồ Bảo Khangg', 1, 1, '', '22-03-2022', '16:33:00'),
(36, 'Hồ Bảo Khang', 1, 1, '', '22-03-2022', '16:59:59'),
(37, 'Hồ Bảo Khang', 1, 2, '', '22-03-2022', '17:00:01'),
(38, 'Hồ Bảo Khang', 1, 1, '', '22-03-2022', '17:08:22'),
(39, 'Hồ Bảo Khang', 1, 2, '', '22-03-2022', '17:08:24'),
(40, 'Nguyễn Ngọc Anh Thư', 2, 1, '', '22-03-2022', '17:08:36'),
(41, 'Nguyễn Ngọc Anh Thư', 2, 2, '', '22-03-2022', '17:08:39'),
(42, 'Hồ Phạm Kim Thy', 4, 1, '', '22-03-2022', '17:12:04'),
(43, 'Hồ Phạm Kim Thy', 4, 2, '', '22-03-2022', '17:12:06'),
(44, 'Hồ Phạm Kim Thy', 4, 1, '', '22-03-2022', '17:12:20'),
(45, 'Hồ Phạm Kim Thy', 4, 2, '', '22-03-2022', '17:12:38'),
(46, 'Hồ Bảo Khang', 1, 1, '', '23-03-2022', '15:15:12'),
(47, 'Hồ Bảo Khang', 1, 2, '', '23-03-2022', '15:15:48'),
(48, 'Hồ Thị Phương', 1, 1, '', '23-03-2022', '15:15:54'),
(49, 'Hồ Thị Phương', 3, 2, '', '23-03-2022', '15:20:35'),
(50, 'Hồ Bảo Khang', 1, 1, '', '23-03-2022', '15:20:38'),
(51, 'Nguyễn Ngọc Anh Thư', 2, 1, '', '23-03-2022', '15:24:51'),
(52, 'Hồ Bảo Khang', 1, 2, '', '23-03-2022', '16:59:53'),
(53, 'Nguyễn Ngọc Anh Thư', 2, 1, '', '23-03-2022', '16:59:58'),
(54, 'Nguyễn Ngọc Anh Thư', 2, 2, '', '23-03-2022', '17:16:02'),
(55, 'Hồ Bảo Khang', 1, 1, '', '23-03-2022', '17:16:05'),
(56, 'Hồ Bảo Khang', 1, 1, '', '24-03-2022', '15:55:42'),
(57, 'Hồ Bảo Khang', 1, 1, '', '24-03-2022', '16:51:29'),
(58, 'Hồ Bảo Khang', 1, 1, '', '24-03-2022', '19:40:11'),
(59, 'Hồ Bảo Khang', 1, 1, '', '24-03-2022', '20:13:13'),
(60, 'Hồ Bảo Khang', 1, 1, '', '25-03-2022', '08:39:35'),
(61, 'Nguyễn Ngọc Anh Thư', 2, 1, '', '25-03-2022', '08:45:20'),
(62, 'Nguyễn Ngọc Anh Thư', 2, 2, '', '25-03-2022', '08:55:57'),
(63, 'Hồ Bảo Khang', 1, 1, '', '25-03-2022', '08:56:00'),
(64, 'Hồ Bảo Khang', 1, 2, '', '25-03-2022', '11:58:20'),
(65, 'Hồ Phạm Kim Thy', 4, 1, '', '25-03-2022', '11:58:23'),
(66, 'Hồ Phạm Kim Thy', 4, 2, '', '25-03-2022', '11:58:26'),
(67, 'Nguyễn Ngọc Anh Thư', 2, 1, '', '25-03-2022', '11:58:28'),
(68, 'Nguyễn Ngọc Anh Thư', 2, 2, '', '25-03-2022', '11:58:55'),
(69, 'Hồ Bảo Khang', 1, 1, '', '25-03-2022', '15:45:47'),
(70, 'Hồ Bảo Khang', 1, 2, '', '25-03-2022', '15:54:31'),
(71, 'Hồ Phạm Kim Thy', 4, 1, '', '25-03-2022', '15:54:36'),
(72, 'Hồ Phạm Kim Thy', 4, 2, '', '25-03-2022', '15:56:13'),
(73, 'Nguyễn Ngọc Anh Thư', 2, 1, '', '25-03-2022', '15:56:19'),
(74, 'Nguyễn Ngọc Anh Thư', 2, 2, '', '25-03-2022', '16:00:46'),
(75, 'Hồ Thị Phương', 3, 1, '', '25-03-2022', '16:00:49'),
(76, 'Hồ Thị Phương', 3, 2, '', '25-03-2022', '16:02:09'),
(77, 'Huỳnh Văn Kha', 6, 1, '', '25-03-2022', '16:02:13'),
(78, 'Huỳnh Văn Kha', 6, 2, '', '25-03-2022', '16:02:17'),
(79, 'Huỳnh Văn Kha', 6, 1, '', '25-03-2022', '16:02:50'),
(80, 'Huỳnh Văn Kha', 6, 2, '', '25-03-2022', '16:03:01'),
(81, 'Hồ Bảo Khang', 1, 1, '', '25-03-2022', '16:03:05'),
(82, 'Hồ Bảo Khang', 1, 2, '', '25-03-2022', '16:03:18'),
(83, 'Hà Văn Bảo', 5, 1, '', '25-03-2022', '16:03:25'),
(84, 'Hà Văn Bảo', 5, 2, '', '25-03-2022', '16:20:09'),
(85, 'Hồ Thị Phương', 3, 1, '', '25-03-2022', '16:20:14'),
(86, 'Hồ Thị Phương', 3, 2, '', '25-03-2022', '16:20:18'),
(87, 'Hà Văn Bảo', 5, 1, '', '25-03-2022', '16:20:34'),
(88, 'Hà Văn Bảo', 5, 2, '', '25-03-2022', '16:20:43'),
(89, 'Huỳnh Văn Kha', 6, 1, '', '25-03-2022', '16:20:50'),
(90, 'Hồ Bảo Khang', 1, 1, '', '25-03-2022', '16:32:18'),
(91, 'Hồ Bảo Khang', 1, 2, '', '25-03-2022', '16:35:16'),
(92, 'Hồ Phạm Kim Thy', 4, 1, '', '25-03-2022', '16:35:19'),
(93, 'Hồ Phạm Kim Thy', 4, 2, '', '25-03-2022', '16:35:24'),
(94, 'Nguyễn Ngọc Anh Thư', 2, 1, '', '25-03-2022', '16:35:27'),
(95, 'Nguyễn Ngọc Anh Thư', 2, 2, '', '25-03-2022', '16:36:19'),
(96, 'Hồng Quân', 6, 1, '', '25-03-2022', '16:36:23'),
(97, 'Hồng Quân', 6, 2, '', '25-03-2022', '16:36:26'),
(98, 'Hồ Thị Phương', 3, 1, '', '25-03-2022', '16:36:30'),
(99, 'Hồ Thị Phương', 3, 2, '', '25-03-2022', '16:36:34'),
(100, 'Hà Văn Bảo', 5, 1, '', '25-03-2022', '16:36:41'),
(101, 'Hồ Bảo Khang', 1, 1, '', '26-03-2022', '09:28:39'),
(102, 'Hồ Bảo Khang', 1, 3, 'Chức vụ:ád', '26-03-2022', '09:40:14'),
(103, 'Hồ Bảo Khang', 1, 3, 'Chức vụ:khách', '26-03-2022', '09:42:07'),
(104, 'Hồ Bảo Khang', 1, 5, 'Chức vụ:kháchásad', '26-03-2022', '09:44:46'),
(105, 'Nguyễn Ngọc Anh Thư', 2, 1, '', '26-03-2022', '17:04:44'),
(106, 'Nguyễn Ngọc Anh Thư', 2, 2, '', '26-03-2022', '17:10:28'),
(107, 'Nguyễn Ngọc Anh Thư', 2, 1, '', '26-03-2022', '17:10:42'),
(108, 'Nguyễn Ngọc Anh Thư', 2, 3, 'Chức vụ:', '26-03-2022', '17:38:48'),
(109, 'Nguyễn Ngọc Anh Thư', 2, 3, 'Chức vụ:', '26-03-2022', '17:43:06'),
(110, 'Nguyễn Ngọc Anh Thư', 2, 3, 'Chức vụ:', '26-03-2022', '17:43:30'),
(111, 'Nguyễn Ngọc Anh Thư', 2, 3, 'Chức vụ:', '26-03-2022', '17:45:17'),
(112, 'Nguyễn Ngọc Anh Thư', 2, 3, 'Tài Liệu:ád', '26-03-2022', '18:40:57'),
(113, 'Nguyễn Ngọc Anh Thư', 2, 5, 'Ảnh Tài Liệu', '26-03-2022', '19:03:57'),
(114, 'Nguyễn Ngọc Anh Thư', 2, 5, 'Tài Liệu:', '26-03-2022', '19:04:00'),
(115, 'Hồ Bảo Khang', 1, 1, '', '26-03-2022', '19:05:03'),
(116, 'Nguyễn Ngọc Anh Thư', 2, 1, '', '27-03-2022', '08:39:03'),
(117, 'Nguyễn Ngọc Anh Thư', 2, 5, 'Ảnh Tài Liệu', '27-03-2022', '08:46:14'),
(118, 'Nguyễn Ngọc Anh Thư', 2, 5, 'Tài Liệu', '27-03-2022', '08:46:20'),
(119, 'Nguyễn Ngọc Anh Thư', 2, 7, 'Duyệt Tài Liệu', '27-03-2022', '09:17:41'),
(120, 'Nguyễn Ngọc Anh Thư', 2, 2, '', '27-03-2022', '10:10:04'),
(121, 'Hồ Bảo Khang', 1, 1, '', '27-03-2022', '10:10:07'),
(122, 'Hồ Bảo Khang', 1, 2, '', '27-03-2022', '10:10:16'),
(123, 'Hồ Bảo Khang', 1, 1, '', '27-03-2022', '10:10:19'),
(124, 'Hồ Bảo Khang', 1, 2, '', '27-03-2022', '10:10:23'),
(125, 'Nguyễn Ngọc Anh Thư', 2, 1, '', '27-03-2022', '10:10:29'),
(126, 'Hồ Bảo Khang', 1, 1, '', '27-03-2022', '10:17:56'),
(127, 'Hồ Bảo Khang', 1, 2, '', '27-03-2022', '10:18:03'),
(128, 'Hồ Thị Phương', 3, 1, '', '27-03-2022', '10:18:06'),
(129, 'Nguyễn Ngọc Anh Thư', 2, 3, 'Chức vụ', '27-03-2022', '10:25:50'),
(130, 'Nguyễn Ngọc Anh Thư', 2, 3, 'Ca Học', '27-03-2022', '10:30:42'),
(131, 'Nguyễn Ngọc Anh Thư', 2, 4, 'Ca Học', '27-03-2022', '10:32:36'),
(132, 'Nguyễn Ngọc Anh Thư', 2, 5, 'Ca Học', '27-03-2022', '10:36:58'),
(133, 'Nguyễn Ngọc Anh Thư', 2, 5, 'Ca Học', '27-03-2022', '10:37:03'),
(134, 'Nguyễn Ngọc Anh Thư', 2, 5, 'Ca Học', '27-03-2022', '10:37:17'),
(135, 'Nguyễn Ngọc Anh Thư', 2, 5, 'Ca Học', '27-03-2022', '10:37:37'),
(136, 'Nguyễn Ngọc Anh Thư', 2, 5, 'Ca Học', '27-03-2022', '10:38:16'),
(137, 'Nguyễn Ngọc Anh Thư', 2, 5, 'Ca Học', '27-03-2022', '10:42:36'),
(138, 'Nguyễn Ngọc Anh Thư', 2, 5, 'Ca Học', '27-03-2022', '10:44:14'),
(139, 'Nguyễn Ngọc Anh Thư', 2, 5, 'Ca Học', '27-03-2022', '10:45:56'),
(140, 'Nguyễn Ngọc Anh Thư', 2, 4, 'Ca Học', '27-03-2022', '10:45:58'),
(141, 'Nguyễn Ngọc Anh Thư', 2, 5, 'Ca Học', '27-03-2022', '10:46:17'),
(142, 'Nguyễn Ngọc Anh Thư', 2, 5, 'Ca Học', '27-03-2022', '10:46:21'),
(143, 'Nguyễn Ngọc Anh Thư', 2, 3, 'Trạng Thái Lớp', '27-03-2022', '10:52:10'),
(144, 'Nguyễn Ngọc Anh Thư', 2, 4, 'Ca Học', '27-03-2022', '10:53:29'),
(145, 'Nguyễn Ngọc Anh Thư', 2, 3, 'Trạng Thái Lớp', '27-03-2022', '10:54:12'),
(146, 'Nguyễn Ngọc Anh Thư', 2, 3, 'Trạng Thái Lớp', '27-03-2022', '10:55:09'),
(147, 'Nguyễn Ngọc Anh Thư', 2, 3, 'Trạng Thái Lớp', '27-03-2022', '10:55:54'),
(148, 'Nguyễn Ngọc Anh Thư', 2, 3, 'Trạng Thái Lớp', '27-03-2022', '10:56:02'),
(149, 'Nguyễn Ngọc Anh Thư', 2, 4, 'Ca Học', '27-03-2022', '10:56:05'),
(150, 'Nguyễn Ngọc Anh Thư', 2, 4, 'Ca Học', '27-03-2022', '10:56:07'),
(151, 'Nguyễn Ngọc Anh Thư', 2, 4, 'Ca Học', '27-03-2022', '10:56:08'),
(152, 'Nguyễn Ngọc Anh Thư', 2, 4, 'Ca Học', '27-03-2022', '10:56:09'),
(153, 'Nguyễn Ngọc Anh Thư', 2, 5, 'Ca Học', '27-03-2022', '10:57:38'),
(154, 'Nguyễn Ngọc Anh Thư', 2, 5, 'Ca Học', '27-03-2022', '10:58:07'),
(155, 'Nguyễn Ngọc Anh Thư', 2, 5, 'Ca Học', '27-03-2022', '10:58:11'),
(156, 'Nguyễn Ngọc Anh Thư', 2, 5, 'Ca Học', '27-03-2022', '10:58:14'),
(157, 'Nguyễn Ngọc Anh Thư', 2, 5, 'Ca Học', '27-03-2022', '10:58:19'),
(158, 'Nguyễn Ngọc Anh Thư', 2, 5, 'Ca Học', '27-03-2022', '10:58:21'),
(159, 'Nguyễn Ngọc Anh Thư', 2, 5, 'Ca Học', '27-03-2022', '10:58:24'),
(160, 'Nguyễn Ngọc Anh Thư', 2, 5, 'Ca Học', '27-03-2022', '10:58:26'),
(161, 'Hồ Thị Phương', 3, 1, '', '27-03-2022', '11:03:00'),
(162, 'Nguyễn Ngọc Anh Thư', 2, 1, '', '27-03-2022', '11:03:25'),
(163, 'Nguyễn Ngọc Anh Thư', 2, 2, '', '27-03-2022', '11:03:51'),
(164, 'Hồ Thị Phương', 3, 1, '', '27-03-2022', '11:03:55'),
(165, 'Hồ Thị Phương', 3, 1, '', '27-03-2022', '11:06:51'),
(166, 'Hồ Thị Phương', 3, 2, '', '27-03-2022', '11:07:00'),
(167, 'Nguyễn Ngọc Anh Thư', 2, 1, '', '27-03-2022', '11:07:05'),
(168, 'Nguyễn Ngọc Anh Thư', 2, 2, '', '27-03-2022', '11:08:34'),
(169, 'Nguyễn Ngọc Anh Thư', 2, 1, '', '27-03-2022', '11:08:36'),
(170, 'Nguyễn Ngọc Anh Thư', 2, 2, '', '27-03-2022', '11:08:41'),
(171, 'Hồ Thị Phương', 3, 1, '', '27-03-2022', '11:08:49'),
(172, 'Hồ Thị Phương', 3, 1, '', '27-03-2022', '11:11:43'),
(173, 'Hồ Thị Phương', 3, 2, '', '27-03-2022', '11:13:57'),
(174, 'Hồ Bảo Khang', 1, 1, '', '27-03-2022', '11:14:01'),
(175, 'Hồ Bảo Khang', 1, 2, '', '27-03-2022', '11:14:09'),
(176, 'Nguyễn Ngọc Anh Thư', 2, 1, '', '27-03-2022', '11:14:16'),
(177, 'Hồ Thị Phương', 3, 1, '', '27-03-2022', '11:14:46'),
(178, 'Hồ Thị Phương', 3, 2, '', '27-03-2022', '11:26:21'),
(179, 'Nguyễn Ngọc Anh Thư', 2, 1, '', '27-03-2022', '11:26:25'),
(180, 'Nguyễn Ngọc Anh Thư', 2, 3, 'Niên Khoá', '27-03-2022', '11:35:26'),
(181, 'Nguyễn Ngọc Anh Thư', 2, 3, 'Niên Khoá', '27-03-2022', '11:35:57'),
(182, 'Nguyễn Ngọc Anh Thư', 2, 4, 'Niên Khoá', '27-03-2022', '11:36:40'),
(183, 'Nguyễn Ngọc Anh Thư', 2, 3, 'Niên Khoá', '27-03-2022', '11:36:50'),
(184, 'Nguyễn Ngọc Anh Thư', 2, 3, 'Niên Khoá', '27-03-2022', '11:37:08'),
(185, 'Nguyễn Ngọc Anh Thư', 2, 4, 'Niên Khoá', '27-03-2022', '11:46:08'),
(186, 'Nguyễn Ngọc Anh Thư', 2, 4, 'Niên Khoá', '27-03-2022', '11:46:09'),
(187, 'Nguyễn Ngọc Anh Thư', 2, 4, 'Niên Khoá', '27-03-2022', '11:46:13'),
(188, 'Nguyễn Ngọc Anh Thư', 2, 4, 'Niên Khoá', '27-03-2022', '11:46:14'),
(189, 'Nguyễn Ngọc Anh Thư', 2, 2, '', '27-03-2022', '11:49:08'),
(190, 'Hồ Bảo Khang', 1, 1, '', '27-03-2022', '11:49:11'),
(191, 'Hồ Bảo Khang', 1, 2, '', '27-03-2022', '11:54:37'),
(192, 'Nguyễn Ngọc Anh Thư', 2, 1, '', '27-03-2022', '11:54:40'),
(193, 'Nguyễn Ngọc Anh Thư', 2, 5, 'Niên Khoá', '27-03-2022', '11:57:42'),
(194, 'Nguyễn Ngọc Anh Thư', 2, 5, 'Niên Khoá', '27-03-2022', '11:58:59'),
(195, 'Nguyễn Ngọc Anh Thư', 2, 5, 'Niên Khoá', '27-03-2022', '11:59:09'),
(196, 'Nguyễn Ngọc Anh Thư', 2, 5, 'Niên Khoá', '27-03-2022', '11:59:18'),
(197, 'Nguyễn Ngọc Anh Thư', 2, 5, 'Ca Học', '27-03-2022', '12:02:10'),
(198, 'Nguyễn Ngọc Anh Thư', 2, 5, 'Ca Học', '27-03-2022', '12:02:14'),
(199, 'Nguyễn Ngọc Anh Thư', 2, 3, 'Ca Học', '27-03-2022', '12:02:18'),
(200, 'Nguyễn Ngọc Anh Thư', 2, 4, 'Ca Học', '27-03-2022', '12:02:19'),
(201, 'Nguyễn Ngọc Anh Thư', 2, 3, 'Trạng Thái Lớp', '27-03-2022', '12:02:27'),
(202, 'Nguyễn Ngọc Anh Thư', 2, 5, 'Trạng Thái Lớp', '27-03-2022', '12:02:30'),
(203, 'Nguyễn Ngọc Anh Thư', 2, 4, 'Trạng Thái Lớp', '27-03-2022', '12:02:31'),
(204, 'Nguyễn Ngọc Anh Thư', 2, 3, 'Niên Khoá', '27-03-2022', '12:03:06'),
(205, 'Nguyễn Ngọc Anh Thư', 2, 5, 'Niên Khoá', '27-03-2022', '12:03:26'),
(206, 'Nguyễn Ngọc Anh Thư', 2, 4, 'Niên Khoá', '27-03-2022', '12:03:28'),
(207, 'Nguyễn Ngọc Anh Thư', 2, 2, '', '27-03-2022', '12:07:18'),
(208, 'Hồ Thị Phương', 3, 1, '', '27-03-2022', '12:07:22'),
(209, 'Hồ Thị Phương', 3, 2, '', '27-03-2022', '12:09:01'),
(210, 'Nguyễn Ngọc Anh Thư', 2, 1, '', '27-03-2022', '12:09:04'),
(211, 'Nguyễn Ngọc Anh Thư', 2, 3, 'Phòng Học', '27-03-2022', '12:21:33'),
(212, 'Nguyễn Ngọc Anh Thư', 2, 3, 'Phòng Học', '27-03-2022', '12:21:58'),
(213, 'Nguyễn Ngọc Anh Thư', 2, 3, 'Phòng Học', '27-03-2022', '12:23:00'),
(214, 'Nguyễn Ngọc Anh Thư', 2, 4, 'Phòng Học', '27-03-2022', '12:24:44'),
(215, 'Nguyễn Ngọc Anh Thư', 2, 3, 'Phòng Học', '27-03-2022', '12:25:23'),
(216, 'Nguyễn Ngọc Anh Thư', 2, 4, 'Phòng Học', '27-03-2022', '12:25:52'),
(217, 'Nguyễn Ngọc Anh Thư', 2, 5, 'Phòng Học', '27-03-2022', '12:28:37'),
(218, 'Nguyễn Ngọc Anh Thư', 2, 5, 'Phòng Học', '27-03-2022', '12:28:52'),
(219, 'Nguyễn Ngọc Anh Thư', 2, 5, 'Phòng Học', '27-03-2022', '12:29:12'),
(220, 'Nguyễn Ngọc Anh Thư', 2, 3, 'Phòng Học', '27-03-2022', '12:30:23'),
(221, 'Nguyễn Ngọc Anh Thư', 2, 5, 'Phòng Học', '27-03-2022', '12:30:27'),
(222, 'Nguyễn Ngọc Anh Thư', 2, 3, 'Phòng Học', '27-03-2022', '12:31:02'),
(223, 'Nguyễn Ngọc Anh Thư', 2, 5, 'Phòng Học', '27-03-2022', '12:31:05'),
(224, 'Nguyễn Ngọc Anh Thư', 2, 5, 'Phòng Học', '27-03-2022', '12:31:24'),
(225, 'Nguyễn Ngọc Anh Thư', 2, 5, 'Phòng Học', '27-03-2022', '12:31:27'),
(226, 'Nguyễn Ngọc Anh Thư', 2, 5, 'Phòng Học', '27-03-2022', '12:31:30'),
(227, 'Nguyễn Ngọc Anh Thư', 2, 5, 'Phòng Học', '27-03-2022', '12:31:33'),
(228, 'Nguyễn Ngọc Anh Thư', 2, 5, 'Phòng Học', '27-03-2022', '12:31:47'),
(229, 'Nguyễn Ngọc Anh Thư', 2, 5, 'Phòng Học', '27-03-2022', '12:31:51'),
(230, 'Nguyễn Ngọc Anh Thư', 2, 2, '', '27-03-2022', '12:37:28'),
(231, 'Hồ Thị Phương', 3, 1, '', '27-03-2022', '12:37:34'),
(232, 'Hồ Thị Phương', 3, 2, '', '27-03-2022', '12:39:51'),
(233, 'Nguyễn Ngọc Anh Thư', 2, 1, '', '27-03-2022', '12:40:01'),
(234, 'Nguyễn Ngọc Anh Thư', 2, 2, '', '27-03-2022', '12:41:31'),
(235, 'Hồ Bảo Khang', 1, 1, '', '27-03-2022', '12:41:33'),
(236, 'Hồ Bảo Khang', 1, 2, '', '27-03-2022', '12:41:46'),
(237, 'Nguyễn Ngọc Anh Thư', 2, 1, '', '27-03-2022', '12:41:50'),
(238, 'Nguyễn Ngọc Anh Thư', 2, 3, 'Chức vụ', '27-03-2022', '12:55:56'),
(239, 'Nguyễn Ngọc Anh Thư', 2, 3, 'Chức vụ', '27-03-2022', '12:57:18'),
(240, 'Nguyễn Ngọc Anh Thư', 2, 3, 'Phòng Học', '27-03-2022', '12:57:45'),
(241, 'Nguyễn Ngọc Anh Thư', 2, 3, 'Phòng Học', '27-03-2022', '12:58:10'),
(242, 'Nguyễn Ngọc Anh Thư', 2, 4, 'Bộ Môn', '27-03-2022', '13:01:03'),
(243, 'Nguyễn Ngọc Anh Thư', 2, 4, 'Bộ Môn', '27-03-2022', '13:01:05'),
(244, 'Nguyễn Ngọc Anh Thư', 2, 3, 'Bộ Môn', '27-03-2022', '13:01:20'),
(245, 'Nguyễn Ngọc Anh Thư', 2, 5, 'Phòng Học', '27-03-2022', '13:09:29'),
(246, 'Nguyễn Ngọc Anh Thư', 2, 5, 'Bộ Môn', '27-03-2022', '13:09:47'),
(247, 'Nguyễn Ngọc Anh Thư', 2, 5, 'Bộ Môn', '27-03-2022', '13:10:43'),
(248, 'Nguyễn Ngọc Anh Thư', 2, 5, 'Bộ Môn', '27-03-2022', '13:10:48'),
(249, 'Nguyễn Ngọc Anh Thư', 2, 4, 'Bộ Môn', '27-03-2022', '13:11:09'),
(250, 'Nguyễn Ngọc Anh Thư', 2, 1, '', '27-03-2022', '14:27:42'),
(251, 'Nguyễn Ngọc Anh Thư', 2, 2, '', '27-03-2022', '14:30:42'),
(252, 'Hồ Bảo Khang', 1, 1, '', '27-03-2022', '14:30:47'),
(253, 'Hồ Bảo Khang', 1, 2, '', '27-03-2022', '14:32:01'),
(254, 'Nguyễn Ngọc Anh Thư', 2, 1, '', '27-03-2022', '14:32:04'),
(255, 'Nguyễn Ngọc Anh Thư', 2, 2, '', '27-03-2022', '14:32:09'),
(256, 'Hồ Thị Phương', 3, 1, '', '27-03-2022', '14:32:13'),
(257, 'Hồ Thị Phương', 3, 2, '', '27-03-2022', '14:32:42'),
(258, '', 0, 2, '', '27-03-2022', '14:32:56'),
(259, 'Hồ Bảo Khang', 1, 1, '', '27-03-2022', '14:32:59'),
(260, 'Hồ Bảo Khang', 1, 2, '', '27-03-2022', '14:33:28'),
(261, 'Hồ Thị Phương', 3, 1, '', '27-03-2022', '14:33:31'),
(262, 'Hồ Thị Phương', 3, 2, '', '27-03-2022', '14:33:45'),
(263, 'Hồ Bảo Khang', 1, 1, '', '27-03-2022', '14:33:48'),
(264, 'Hồ Bảo Khang', 1, 2, '', '27-03-2022', '14:35:52'),
(265, 'Hồ Bảo Khang', 1, 1, '', '27-03-2022', '14:36:02'),
(266, 'Hồ Bảo Khang', 1, 2, '', '27-03-2022', '14:37:57'),
(267, 'Nguyễn Ngọc Anh Thư', 2, 1, '', '27-03-2022', '14:38:01'),
(268, 'Nguyễn Ngọc Anh Thư', 2, 2, '', '27-03-2022', '14:39:08'),
(269, 'Hồ Bảo Khang', 1, 1, '', '27-03-2022', '14:39:13'),
(270, 'Hồ Bảo Khang', 1, 2, '', '27-03-2022', '14:42:25'),
(271, 'Nguyễn Ngọc Anh Thư', 2, 1, '', '27-03-2022', '14:42:28'),
(272, 'Nguyễn Ngọc Anh Thư', 2, 2, '', '27-03-2022', '14:47:46'),
(273, 'Nguyễn Ngọc Anh Thư', 2, 1, '', '27-03-2022', '14:47:52'),
(274, 'Nguyễn Ngọc Anh Thư', 2, 2, '', '27-03-2022', '14:49:24'),
(275, 'Nguyễn Ngọc Anh Thư', 2, 1, '', '27-03-2022', '14:49:30'),
(276, 'Nguyễn Ngọc Anh Thư', 2, 3, 'Tài Liệu', '27-03-2022', '14:52:30'),
(277, 'Nguyễn Ngọc Anh Thư', 2, 7, 'Duyệt Tài Liệu', '27-03-2022', '14:52:40'),
(278, 'Nguyễn Ngọc Anh Thư', 2, 8, 'Từ Chối Tài Liệu', '27-03-2022', '14:52:43'),
(279, 'Nguyễn Ngọc Anh Thư', 2, 2, '', '27-03-2022', '14:59:37'),
(280, 'Hồ Bảo Khang', 1, 1, '', '27-03-2022', '14:59:41'),
(281, 'Hồ Bảo Khang', 1, 2, '', '27-03-2022', '15:00:16'),
(282, '', 0, 2, '', '27-03-2022', '15:00:55'),
(283, 'Hồ Bảo Khang', 1, 1, '', '27-03-2022', '15:56:38'),
(284, 'Hồ Bảo Khang', 1, 2, '', '27-03-2022', '16:07:44'),
(285, 'Nguyễn Ngọc Anh Thư', 2, 1, '', '27-03-2022', '16:07:47'),
(286, 'Nguyễn Ngọc Anh Thư', 2, 5, 'Phòng Học', '27-03-2022', '16:10:33'),
(287, 'Nguyễn Ngọc Anh Thư', 2, 5, 'Phòng Học', '27-03-2022', '16:10:36'),
(288, 'Nguyễn Ngọc Anh Thư', 2, 4, 'Phòng Học', '27-03-2022', '16:10:39'),
(289, 'Nguyễn Ngọc Anh Thư', 2, 3, 'Phòng Học', '27-03-2022', '16:10:44'),
(290, 'Nguyễn Ngọc Anh Thư', 2, 5, 'Ca Học', '27-03-2022', '16:13:01'),
(291, 'Nguyễn Ngọc Anh Thư', 2, 5, 'Ca Học', '27-03-2022', '16:13:34'),
(292, 'Nguyễn Ngọc Anh Thư', 2, 5, 'Ca Học', '27-03-2022', '16:13:41'),
(293, 'Nguyễn Ngọc Anh Thư', 2, 5, 'Ca Học', '27-03-2022', '16:14:15'),
(294, 'Nguyễn Ngọc Anh Thư', 2, 5, 'Ca Học', '27-03-2022', '16:15:45'),
(295, 'Nguyễn Ngọc Anh Thư', 2, 5, 'Ca Học', '27-03-2022', '16:15:55'),
(296, 'Nguyễn Ngọc Anh Thư', 2, 5, 'Ca Học', '27-03-2022', '16:16:20'),
(297, 'Nguyễn Ngọc Anh Thư', 2, 5, 'Ca Học', '27-03-2022', '16:16:35'),
(298, 'Nguyễn Ngọc Anh Thư', 2, 5, 'Ca Học', '27-03-2022', '16:16:59'),
(299, 'Nguyễn Ngọc Anh Thư', 2, 5, 'Ca Học', '27-03-2022', '16:17:10'),
(300, 'Nguyễn Ngọc Anh Thư', 2, 5, 'Ca Học', '27-03-2022', '16:17:31'),
(301, 'Nguyễn Ngọc Anh Thư', 2, 3, 'Ca Học', '27-03-2022', '16:18:14'),
(302, 'Nguyễn Ngọc Anh Thư', 2, 3, 'Ca Học', '27-03-2022', '16:18:56'),
(303, 'Nguyễn Ngọc Anh Thư', 2, 3, 'Ca Học', '27-03-2022', '16:19:16'),
(304, 'Nguyễn Ngọc Anh Thư', 2, 3, 'Ca Học', '27-03-2022', '16:19:31'),
(305, 'Nguyễn Ngọc Anh Thư', 2, 3, 'Ca Học', '27-03-2022', '16:19:47'),
(306, 'Nguyễn Ngọc Anh Thư', 2, 3, 'Ca Học', '27-03-2022', '16:20:39'),
(307, 'Nguyễn Ngọc Anh Thư', 2, 3, 'Ca Học', '27-03-2022', '16:21:31'),
(308, 'Nguyễn Ngọc Anh Thư', 2, 1, '', '28-03-2022', '10:08:17'),
(309, 'Nguyễn Ngọc Anh Thư', 2, 2, '', '28-03-2022', '10:12:35'),
(310, 'Hồ Thị Phương', 3, 1, '', '28-03-2022', '10:12:42'),
(311, 'Hồ Thị Phương', 3, 2, '', '28-03-2022', '10:17:47'),
(312, 'Hồ Thị Phương', 3, 1, '', '28-03-2022', '10:17:52'),
(313, 'Hồ Thị Phương', 3, 2, '', '28-03-2022', '10:19:36'),
(314, 'Nguyễn Ngọc Anh Thư', 2, 1, '', '28-03-2022', '10:19:43'),
(315, 'Nguyễn Ngọc Anh Thư', 2, 3, 'Bộ Môn', '28-03-2022', '10:33:53'),
(316, 'Nguyễn Ngọc Anh Thư', 2, 4, 'Bộ Môn', '28-03-2022', '10:34:01'),
(317, 'Nguyễn Ngọc Anh Thư', 2, 3, 'Bộ Môn', '28-03-2022', '10:34:57'),
(318, 'Nguyễn Ngọc Anh Thư', 2, 3, 'Môn Học', '28-03-2022', '10:36:16'),
(319, 'Nguyễn Ngọc Anh Thư', 2, 3, 'Môn Học', '28-03-2022', '10:38:25'),
(320, 'Nguyễn Ngọc Anh Thư', 2, 3, 'Thêm Giảng Viên Dạy Bộ Môn', '28-03-2022', '11:31:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `history_action`
--

CREATE TABLE `history_action` (
  `id_act` int(10) UNSIGNED NOT NULL,
  `action_name` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `history_action`
--

INSERT INTO `history_action` (`id_act`, `action_name`) VALUES
(1, 'Đăng Nhập'),
(2, 'Đăng Xuất'),
(3, 'Thêm'),
(4, 'Xoá'),
(5, 'Sửa'),
(6, 'Thanh Toán'),
(7, 'Duyệt'),
(8, 'Từ Chối');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoa_don`
--

CREATE TABLE `hoa_don` (
  `id_hd` int(11) NOT NULL,
  `MaThu` varchar(20) NOT NULL,
  `NgayThang` date NOT NULL,
  `SoTien` float NOT NULL,
  `NoiDung` varchar(255) NOT NULL,
  `id_nv` int(11) UNSIGNED NOT NULL,
  `id_hs` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lich_hoc`
--

CREATE TABLE `lich_hoc` (
  `id_lichhoc` int(11) UNSIGNED NOT NULL,
  `NgayKhaiGiang` date DEFAULT NULL,
  `NgayKetThuc` date DEFAULT NULL,
  `GhiChu` varchar(256) NOT NULL,
  `id_lop` int(11) UNSIGNED NOT NULL,
  `handangky` date NOT NULL,
  `id_phong` int(11) NOT NULL,
  `id_nienkhoa` int(11) NOT NULL,
  `id_ca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lich_thi`
--

CREATE TABLE `lich_thi` (
  `id_lichthi` int(11) UNSIGNED NOT NULL,
  `id_gv` int(11) UNSIGNED NOT NULL,
  `ngay_thi` int(11) NOT NULL,
  `gio` int(11) NOT NULL,
  `id_lop` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_thu_chi`
--

CREATE TABLE `loai_thu_chi` (
  `id_loaithuchi` int(10) NOT NULL,
  `Loai` varchar(10) CHARACTER SET utf8 NOT NULL,
  `TenLoai` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loai_thu_chi`
--

INSERT INTO `loai_thu_chi` (`id_loaithuchi`, `Loai`, `TenLoai`) VALUES
(1, 'Chi', 'Chi phí lương'),
(2, 'Chi', 'Khuyến mại học phí'),
(3, 'Chi', 'Marketing'),
(4, 'Chi', 'Chi phí hoạt động'),
(5, 'Chi', 'Tiền thuê nhà'),
(6, 'Chi', 'Chi phí phát sinh (khác)'),
(7, 'Thu', 'Thu học phí'),
(8, 'Chi', 'Chi phí đầu tư'),
(9, 'Chi', 'Chi tiền sách + tài liệu');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lop_hoc`
--

CREATE TABLE `lop_hoc` (
  `id_lop` int(11) UNSIGNED NOT NULL,
  `MaLop` varchar(10) NOT NULL,
  `Khoa` int(11) NOT NULL,
  `id_gv` int(11) UNSIGNED NOT NULL,
  `trangthailop` int(11) NOT NULL,
  `soluongdk` int(2) NOT NULL,
  `si_so` int(2) NOT NULL,
  `id_mh` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `lop_hoc`
--

INSERT INTO `lop_hoc` (`id_lop`, `MaLop`, `Khoa`, `id_gv`, `trangthailop`, `soluongdk`, `si_so`, `id_mh`) VALUES
(53, 'JavaCB_01', 1, 26, 4, 20, 0, 2),
(54, 'JavaCB_02', 1, 26, 4, 20, 0, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mon_hoc`
--

CREATE TABLE `mon_hoc` (
  `id_mon` int(11) UNSIGNED NOT NULL,
  `type` int(11) UNSIGNED NOT NULL,
  `hocphi` varchar(10) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `ten_monhoc` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `gt_mh` longtext COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `mon_hoc`
--

INSERT INTO `mon_hoc` (`id_mon`, `type`, `hocphi`, `ten_monhoc`, `gt_mh`) VALUES
(1, 3, '3000000', 'Java Cơ Bản', ''),
(2, 1, '5000000', 'PHP Cơ Bản', ''),
(54, 1, '5000000', 'php', '<p>a</p>\r\n');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nien_khoa`
--

CREATE TABLE `nien_khoa` (
  `id_nk` int(11) NOT NULL,
  `ten_nk` varchar(1) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `nam_nk` varchar(10) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `trangthai_nk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `nien_khoa`
--

INSERT INTO `nien_khoa` (`id_nk`, `ten_nk`, `nam_nk`, `trangthai_nk`) VALUES
(1, '1', '2021', 7),
(2, '2', '2022', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phan_hoi`
--

CREATE TABLE `phan_hoi` (
  `id_phanhoi` int(11) UNSIGNED NOT NULL,
  `ho_ten` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `sdt` varchar(10) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `mail` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `noidung` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `id_nv` int(11) UNSIGNED NOT NULL,
  `trangthai` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `phan_hoi`
--

INSERT INTO `phan_hoi` (`id_phanhoi`, `ho_ten`, `sdt`, `mail`, `noidung`, `id_nv`, `trangthai`) VALUES
(16, 'Hồ Bảo kHang', '0938958514', 'baokhagg@gmail.com', 'Có khóa học nào hay không?', 0, 0),
(15, 'Hồ Bảo Khang', '0938958514', 'baokhagg@gmail.com', 'không', 0, 0),
(17, 'HBK', '0938958514', 'baokhagg@gmail.com', 'Thắc mắc về chương trình giảm giá', 0, 0),
(18, 'HBB', '0123456789', 'bobo@gmail.com', 'Khóa học tin học văn phòng cơ bản khi nào mở lớp?', 0, 0),
(20, 'Hồ Bảo kHang', '0123456789', 'baokhagg@gmail.com', 'Keke', 0, 0),
(21, 'Hồ Bảo kHang', '0123456789', 'baokhagg@gmail.com', 'khhh', 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phong_hoc`
--

CREATE TABLE `phong_hoc` (
  `id_phong` int(11) NOT NULL,
  `Phong` int(3) NOT NULL,
  `id_ttp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `phong_hoc`
--

INSERT INTO `phong_hoc` (`id_phong`, `Phong`, `id_ttp`) VALUES
(1, 101, 1),
(2, 102, 1),
(3, 103, 1),
(5, 104, 1),
(10, 105, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `register`
--

CREATE TABLE `register` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `password` varchar(1000) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `usertype` int(11) UNSIGNED NOT NULL,
  `status` int(1) NOT NULL,
  `user_code` varchar(10) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `granduate` varchar(50) NOT NULL,
  `birth` date DEFAULT NULL,
  `img` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `register`
--

INSERT INTO `register` (`id`, `email`, `password`, `username`, `usertype`, `status`, `user_code`, `address`, `phone`, `granduate`, `birth`, `img`) VALUES
(1, 'baokhagg2k@gmail.com', '1220e6298308fdd7d76cedca87e56a96', 'Hồ Bảo Khang', 1, 0, 'NS-1234567', 'TPHCM', '0938958514', '8', '2000-02-02', '7d5760ba794d8b13d25c.jpg'),
(2, 'bohihi@gmail.com', '1220e6298308fdd7d76cedca87e56a96', 'Hồ Phạm Kim Thy', 4, 0, 'NS-7654321', 'TPHCM', '0877227747', '7', '2007-01-15', 'ngo-ngang-voi-ve-dep-cua-hot-girl-anh-the-chua-tron-18-docx-1622043349706.jpeg'),
(3, 'haru0489@yahoo.com.vn', '827ccb0eea8a706c4c34a16891f84e7b', 'Nguyễn Ngọc Anh Thư', 2, 0, 'NS-2589631', 'TPHCM', '0877227202', '8', '2000-01-11', ''),
(4, 'juile@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Hồ Thị Phương', 3, 0, 'NS-1478952', 'TPHCM', '0877229988', '4', '2000-01-01', ''),
(26, 'bao@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Hà Văn Bảo', 5, 0, 'NS-3698686', 'TPHCM', '0936365658', '4', '2000-01-01', ''),
(54, 'hongquan@gmail.com', 'c51d99be8ce85b5fc61e2a889243dc72', 'Hồng Quân', 6, 0, 'HV-9869873', 'TPHCM', '0877565658', '2', '2000-01-01', 'sam-pearce-warrilow-veJsczC8R4M-unsplash.jpg'),
(55, 'kha@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Huỳnh Văn Kha', 6, 0, 'NV-1236899', 'TPHCM', '0988986969', '1', '2000-01-01', 'lead.jpg'),
(65, 'b@gmail.com', 'c51d99be8ce85b5fc61e2a889243dc72', 'Khádasd', 6, 0, 'HV-6613903', '123as', '098765434', '', '2000-02-02', ''),
(66, 'kimchi@gmail.com', 'c51d99be8ce85b5fc61e2a889243dc72', 'Kim Chi', 6, 0, 'HV-9835528', '123a', '098765423', '', '2000-12-21', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tai_lieu`
--

CREATE TABLE `tai_lieu` (
  `id_tailieu` int(11) NOT NULL,
  `TuaDe` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `TomTat` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `file` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `NgayDang` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `id_lop` int(11) UNSIGNED NOT NULL,
  `TrangThai` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `id_nv` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tai_lieu`
--

INSERT INTO `tai_lieu` (`id_tailieu`, `TuaDe`, `TomTat`, `file`, `NgayDang`, `id_lop`, `TrangThai`, `id_nv`) VALUES
(34, 'ád23ádad', 'ád', 'denis-vdovin-qF6C1UDXyN0-unsplash.jpg', '26-03-2022', 53, '0', 3),
(35, 'AAaa', 'qưaa', 'm.jpg', '26-03-2022', 54, '1', 3),
(36, 'PHP', 'ád', 'krzysztof-grech-UPzxsvsVzJk-unsplash.jpg', '27-03-2022', 54, '0', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongtin_web`
--

CREATE TABLE `thongtin_web` (
  `stt` int(11) NOT NULL,
  `logo` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `GioLam` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Facebook` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `Youtube` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `Hotline` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Lienhe` varchar(3000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thongtin_web`
--

INSERT INTO `thongtin_web` (`stt`, `logo`, `GioLam`, `Facebook`, `Youtube`, `Hotline`, `Lienhe`) VALUES
(1, '44.png', '8:00 - 20:30', 'https://www.facebook.com/bao.khagg/', 'https://www.youtube.com/channel/UCIn7_XShn7F5I2jmYY9mWWQ', '0877227202-0877227747', '<p><strong>Địa Chỉ:&nbsp;</strong>527 &Acirc;u Cơ P.10 Quận T&acirc;n B&igrave;nh TP.HCM</p>\r\n');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thu_chi`
--

CREATE TABLE `thu_chi` (
  `id_thuchi` int(11) NOT NULL,
  `NgayThang` date NOT NULL,
  `ThuChi` varchar(10) NOT NULL,
  `NoiDung` varchar(255) NOT NULL,
  `SoTienThu` float NOT NULL,
  `SoTienChi` float NOT NULL,
  `LuyKe` varchar(12) NOT NULL,
  `GhiChu` varchar(255) NOT NULL,
  `Nam` varchar(4) NOT NULL,
  `Thang` varchar(3) NOT NULL,
  `Quy` varchar(3) NOT NULL,
  `Khoa` varchar(10) NOT NULL,
  `loai` int(11) UNSIGNED NOT NULL,
  `id_nv` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tinh_trang_phong`
--

CREATE TABLE `tinh_trang_phong` (
  `id_ttp` int(11) NOT NULL,
  `TinhTrangPhong` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `tinh_trang_phong`
--

INSERT INTO `tinh_trang_phong` (`id_ttp`, `TinhTrangPhong`) VALUES
(1, 'Có Thể Sử Dụng'),
(2, 'Bảo Trì');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tin_tuc`
--

CREATE TABLE `tin_tuc` (
  `id_tt` int(11) NOT NULL,
  `TuaDe` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `TinTuc` varchar(20000) COLLATE utf8_unicode_ci NOT NULL,
  `img_tt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten_url` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `NgayDang` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `TrangThai` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `id_nv` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tin_tuc`
--

INSERT INTO `tin_tuc` (`id_tt`, `TuaDe`, `TinTuc`, `img_tt`, `url`, `ten_url`, `NgayDang`, `TrangThai`, `id_nv`) VALUES
(32, 'PHP', '&lt;p&gt;&lt;strong&gt;HALKHFFKJsdafasczxczxcqw&amp;aacute;dascxchakjsncakjsndlqkw qhcbc&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;&amp;Aacute;dajsnx&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;&amp;Aacute;dw&amp;nbsp;&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;đ&amp;acirc;s&lt;/p&gt;', 'php2.png', 'http://vieclamvietphat.com/', 'viec', '24-03-2022', '0', 1),
(35, 'C', '<p><em><u><strong>Ng&ocirc;n ngữ C</strong></u></em></p>\r\n', 'c.jpg', '', '', '25-03-2022', '1', 1),
(36, 'Mở Lớp', '<p>Mở Lớp &aacute;ds</p>\r\n', 'denis-vdovin-qF6C1UDXyN0-unsplash.jpg', 'http://vieclamvietphat.com/', '', '27-03-2022', '0', 1),
(37, 'Mở Lớp', '<p>ABC</p>\r\n', 'l.jpg', '', '', '27-03-2022', '1', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trang_thai_lop`
--

CREATE TABLE `trang_thai_lop` (
  `id_ttl` int(11) NOT NULL,
  `ten_ttl` varchar(256) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `trang_thai_lop`
--

INSERT INTO `trang_thai_lop` (`id_ttl`, `ten_ttl`) VALUES
(1, 'Lên Kế hoạch'),
(2, 'Đang Đăng Ký'),
(3, 'Hết Hạn Đăng Ký'),
(4, 'Đang Học\r\n'),
(5, 'Thi'),
(6, 'Có Điểm Thi '),
(7, 'Kết Thúc');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trinh_do`
--

CREATE TABLE `trinh_do` (
  `id_trinhdo` int(11) UNSIGNED NOT NULL,
  `TrinhDo` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `trinh_do`
--

INSERT INTO `trinh_do` (`id_trinhdo`, `TrinhDo`) VALUES
(1, 'Cấp 3'),
(2, 'Trung Cấp'),
(3, 'Cao Đẳng'),
(4, 'Đại Học'),
(5, 'Thạc Sĩ '),
(6, 'Tiến Sĩ'),
(7, 'Phó Giáo Sư'),
(8, 'Giáo Sư'),
(9, 'Khác');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bo_mon`
--
ALTER TABLE `bo_mon`
  ADD PRIMARY KEY (`id_bo_mon`);

--
-- Chỉ mục cho bảng `ca_hoc`
--
ALTER TABLE `ca_hoc`
  ADD PRIMARY KEY (`id_ca`);

--
-- Chỉ mục cho bảng `chi_tiet_lop_hoc`
--
ALTER TABLE `chi_tiet_lop_hoc`
  ADD PRIMARY KEY (`id_ct_lop`),
  ADD KEY `lopct` (`id_lop`),
  ADD KEY `id_hs_chitietlophoc` (`id_hs`);

--
-- Chỉ mục cho bảng `chuc_vu`
--
ALTER TABLE `chuc_vu`
  ADD PRIMARY KEY (`id_cv`);

--
-- Chỉ mục cho bảng `cong_no`
--
ALTER TABLE `cong_no`
  ADD PRIMARY KEY (`id_congno`),
  ADD KEY `cnlop` (`id_lop`),
  ADD KEY `id_hs_congno` (`id_hs`);

--
-- Chỉ mục cho bảng `ct_gv`
--
ALTER TABLE `ct_gv`
  ADD PRIMARY KEY (`id_ctgv`);

--
-- Chỉ mục cho bảng `gioi_thieu`
--
ALTER TABLE `gioi_thieu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `history_action`
--
ALTER TABLE `history_action`
  ADD PRIMARY KEY (`id_act`);

--
-- Chỉ mục cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD PRIMARY KEY (`id_hd`),
  ADD KEY `nv_thu` (`id_nv`),
  ADD KEY `id_hs_hoadon` (`id_hs`);

--
-- Chỉ mục cho bảng `lich_hoc`
--
ALTER TABLE `lich_hoc`
  ADD PRIMARY KEY (`id_lichhoc`),
  ADD KEY `lichhoc_lophoc` (`id_lop`),
  ADD KEY `phong` (`id_phong`),
  ADD KEY `nienkhoa` (`id_nienkhoa`);

--
-- Chỉ mục cho bảng `lich_thi`
--
ALTER TABLE `lich_thi`
  ADD PRIMARY KEY (`id_lichthi`),
  ADD KEY `gvcoithi` (`id_gv`),
  ADD KEY `lopthi` (`id_lop`);

--
-- Chỉ mục cho bảng `loai_thu_chi`
--
ALTER TABLE `loai_thu_chi`
  ADD PRIMARY KEY (`id_loaithuchi`);

--
-- Chỉ mục cho bảng `lop_hoc`
--
ALTER TABLE `lop_hoc`
  ADD PRIMARY KEY (`id_lop`),
  ADD KEY `gv_lop` (`id_gv`),
  ADD KEY `lhmh` (`id_mh`);

--
-- Chỉ mục cho bảng `mon_hoc`
--
ALTER TABLE `mon_hoc`
  ADD PRIMARY KEY (`id_mon`),
  ADD KEY `loaimh` (`type`);

--
-- Chỉ mục cho bảng `nien_khoa`
--
ALTER TABLE `nien_khoa`
  ADD PRIMARY KEY (`id_nk`);

--
-- Chỉ mục cho bảng `phan_hoi`
--
ALTER TABLE `phan_hoi`
  ADD PRIMARY KEY (`id_phanhoi`);

--
-- Chỉ mục cho bảng `phong_hoc`
--
ALTER TABLE `phong_hoc`
  ADD PRIMARY KEY (`id_phong`);

--
-- Chỉ mục cho bảng `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chucvu` (`usertype`);

--
-- Chỉ mục cho bảng `tai_lieu`
--
ALTER TABLE `tai_lieu`
  ADD PRIMARY KEY (`id_tailieu`),
  ADD KEY `tailieu_lop_duyet` (`id_lop`),
  ADD KEY `id_nv_tailieu` (`id_nv`);

--
-- Chỉ mục cho bảng `thongtin_web`
--
ALTER TABLE `thongtin_web`
  ADD PRIMARY KEY (`stt`);

--
-- Chỉ mục cho bảng `thu_chi`
--
ALTER TABLE `thu_chi`
  ADD PRIMARY KEY (`id_thuchi`),
  ADD KEY `nv_thuchi` (`id_nv`);

--
-- Chỉ mục cho bảng `tinh_trang_phong`
--
ALTER TABLE `tinh_trang_phong`
  ADD PRIMARY KEY (`id_ttp`);

--
-- Chỉ mục cho bảng `tin_tuc`
--
ALTER TABLE `tin_tuc`
  ADD PRIMARY KEY (`id_tt`),
  ADD KEY `nv_tt` (`id_nv`);

--
-- Chỉ mục cho bảng `trang_thai_lop`
--
ALTER TABLE `trang_thai_lop`
  ADD PRIMARY KEY (`id_ttl`);

--
-- Chỉ mục cho bảng `trinh_do`
--
ALTER TABLE `trinh_do`
  ADD PRIMARY KEY (`id_trinhdo`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bo_mon`
--
ALTER TABLE `bo_mon`
  MODIFY `id_bo_mon` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `ca_hoc`
--
ALTER TABLE `ca_hoc`
  MODIFY `id_ca` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `chi_tiet_lop_hoc`
--
ALTER TABLE `chi_tiet_lop_hoc`
  MODIFY `id_ct_lop` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `chuc_vu`
--
ALTER TABLE `chuc_vu`
  MODIFY `id_cv` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `cong_no`
--
ALTER TABLE `cong_no`
  MODIFY `id_congno` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `ct_gv`
--
ALTER TABLE `ct_gv`
  MODIFY `id_ctgv` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `gioi_thieu`
--
ALTER TABLE `gioi_thieu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=321;

--
-- AUTO_INCREMENT cho bảng `history_action`
--
ALTER TABLE `history_action`
  MODIFY `id_act` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  MODIFY `id_hd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `lich_hoc`
--
ALTER TABLE `lich_hoc`
  MODIFY `id_lichhoc` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `lich_thi`
--
ALTER TABLE `lich_thi`
  MODIFY `id_lichthi` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `loai_thu_chi`
--
ALTER TABLE `loai_thu_chi`
  MODIFY `id_loaithuchi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `lop_hoc`
--
ALTER TABLE `lop_hoc`
  MODIFY `id_lop` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT cho bảng `mon_hoc`
--
ALTER TABLE `mon_hoc`
  MODIFY `id_mon` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT cho bảng `nien_khoa`
--
ALTER TABLE `nien_khoa`
  MODIFY `id_nk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `phan_hoi`
--
ALTER TABLE `phan_hoi`
  MODIFY `id_phanhoi` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `phong_hoc`
--
ALTER TABLE `phong_hoc`
  MODIFY `id_phong` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT cho bảng `tai_lieu`
--
ALTER TABLE `tai_lieu`
  MODIFY `id_tailieu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT cho bảng `thongtin_web`
--
ALTER TABLE `thongtin_web`
  MODIFY `stt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `thu_chi`
--
ALTER TABLE `thu_chi`
  MODIFY `id_thuchi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;

--
-- AUTO_INCREMENT cho bảng `tinh_trang_phong`
--
ALTER TABLE `tinh_trang_phong`
  MODIFY `id_ttp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tin_tuc`
--
ALTER TABLE `tin_tuc`
  MODIFY `id_tt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `trang_thai_lop`
--
ALTER TABLE `trang_thai_lop`
  MODIFY `id_ttl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `trinh_do`
--
ALTER TABLE `trinh_do`
  MODIFY `id_trinhdo` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chi_tiet_lop_hoc`
--
ALTER TABLE `chi_tiet_lop_hoc`
  ADD CONSTRAINT `id_hs_chitietlophoc` FOREIGN KEY (`id_hs`) REFERENCES `register` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lopct` FOREIGN KEY (`id_lop`) REFERENCES `lop_hoc` (`id_lop`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `cong_no`
--
ALTER TABLE `cong_no`
  ADD CONSTRAINT `cnlop` FOREIGN KEY (`id_lop`) REFERENCES `lop_hoc` (`id_lop`),
  ADD CONSTRAINT `id_hs_congno` FOREIGN KEY (`id_hs`) REFERENCES `register` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD CONSTRAINT `id_hs_hoadon` FOREIGN KEY (`id_hs`) REFERENCES `register` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_nv_hoadon` FOREIGN KEY (`id_nv`) REFERENCES `register` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `lich_hoc`
--
ALTER TABLE `lich_hoc`
  ADD CONSTRAINT `lichhoc_lophoc` FOREIGN KEY (`id_lop`) REFERENCES `lop_hoc` (`id_lop`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nienkhoa` FOREIGN KEY (`id_nienkhoa`) REFERENCES `nien_khoa` (`id_nk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `phong` FOREIGN KEY (`id_phong`) REFERENCES `phong_hoc` (`id_phong`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `lich_thi`
--
ALTER TABLE `lich_thi`
  ADD CONSTRAINT `gvcoithi` FOREIGN KEY (`id_gv`) REFERENCES `register` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lopthi` FOREIGN KEY (`id_lop`) REFERENCES `lop_hoc` (`id_lop`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `lop_hoc`
--
ALTER TABLE `lop_hoc`
  ADD CONSTRAINT `gv_lop` FOREIGN KEY (`id_gv`) REFERENCES `register` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lhmh` FOREIGN KEY (`id_mh`) REFERENCES `mon_hoc` (`id_mon`);

--
-- Các ràng buộc cho bảng `mon_hoc`
--
ALTER TABLE `mon_hoc`
  ADD CONSTRAINT `loaimh` FOREIGN KEY (`type`) REFERENCES `bo_mon` (`id_bo_mon`);

--
-- Các ràng buộc cho bảng `register`
--
ALTER TABLE `register`
  ADD CONSTRAINT `chucvu` FOREIGN KEY (`usertype`) REFERENCES `chuc_vu` (`id_cv`);

--
-- Các ràng buộc cho bảng `tai_lieu`
--
ALTER TABLE `tai_lieu`
  ADD CONSTRAINT `id_nv_tailieu` FOREIGN KEY (`id_nv`) REFERENCES `register` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tailieu_lop_duyet` FOREIGN KEY (`id_lop`) REFERENCES `lop_hoc` (`id_lop`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `thu_chi`
--
ALTER TABLE `thu_chi`
  ADD CONSTRAINT `id_nv_thuchi` FOREIGN KEY (`id_nv`) REFERENCES `register` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tin_tuc`
--
ALTER TABLE `tin_tuc`
  ADD CONSTRAINT `nv_tt` FOREIGN KEY (`id_nv`) REFERENCES `register` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20221008.4b87169816
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2022 at 07:48 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` varchar(5) NOT NULL,
  `name` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
('1', 'Nived', 'admin@admin.com', 'abc');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `image_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `image_name`) VALUES
(6, 'banner1 (2).jpg'),
(7, 'banner2 (2).jpg'),
(8, 'banner3 (1).jpg'),
(9, 'banner4 (1).png'),
(10, 'banner4 (1).jpg'),
(11, 'banner4 (1).png'),
(12, 'banner3 (1).jpg'),
(13, 'banner4 (1).jpg'),
(14, 'banner2 (2).jpg'),
(15, 'banner1 (2).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `c_id` int(5) NOT NULL,
  `p_id` int(5) NOT NULL,
  `color` text NOT NULL,
  `size` text NOT NULL,
  `quantity` int(5) NOT NULL,
  `description` text NOT NULL,
  `custom_image` varchar(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(4) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Fashion'),
(3, 'gift'),
(4, 'Drawings'),
(5, 'Wood craft'),
(6, 'clay craft'),
(7, 'paintings'),
(9, 'toys'),
(10, 'Gadgets');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(5) NOT NULL,
  `f_name` varchar(15) NOT NULL,
  `l_name` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` text NOT NULL,
  `address` text NOT NULL,
  `state` varchar(20) NOT NULL,
  `city` text NOT NULL,
  `pin` int(6) NOT NULL,
  `password` text NOT NULL,
  `status` int(2) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `f_name`, `l_name`, `email`, `phone`, `address`, `state`, `city`, `pin`, `password`, `status`, `date`) VALUES
(1, 'nived', 'R', 'nived@gmail.com', '9809159745', 'house no 19 pattanchery', 'kerala', 'palakkad', 698425, 'abc', 1, '0000-00-00'),
(2, 'adarsh', 'kv', 'adarsh@gmail.com', '8795421630', 'house no 6 payangadi', 'kannur', 'thavam', 698425, 'abc', 1, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `status` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `user`, `name`, `email`, `subject`, `message`, `status`, `date`) VALUES
(3, 0, 'nived', 'nived@gmail.com', 'subject', 'good', 1, '2022-10-20 21:23:23'),
(4, 0, 'nived', 'nived@gmail.com', 'qwe', 'asdfgbgfdsawedsdsx', 0, '2022-10-23 18:20:50'),
(5, 1, 'sam', 'sam@gmail.com', 'qwertyuio', 'sdfghjkpoiuytrertyuio', 0, '2022-10-23 18:34:31');

-- --------------------------------------------------------

--
-- Table structure for table `ordered_products`
--

CREATE TABLE `ordered_products` (
  `id` int(5) NOT NULL,
  `order_id` int(5) NOT NULL,
  `p_id` int(5) NOT NULL,
  `quantity` int(5) NOT NULL,
  `price` int(6) NOT NULL,
  `color` text NOT NULL,
  `size` text NOT NULL,
  `description` text NOT NULL,
  `custom_image` text NOT NULL,
  `status` int(2) NOT NULL,
  `date` datetime NOT NULL,
  `delivery_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ordered_products`
--

INSERT INTO `ordered_products` (`id`, `order_id`, `p_id`, `quantity`, `price`, `color`, `size`, `description`, `custom_image`, `status`, `date`, `delivery_date`) VALUES
(12, 7, 16, 1, 300, 'Blue', 'S', 'name', 'nived img.jpg', 3, '2022-09-17 08:37:31', '2022-10-17 06:27:58'),
(13, 7, 14, 1, 450, 'Blue', 'S', 'hgfd', '130002.jpg', 0, '2022-09-17 08:37:31', NULL),
(14, 8, 13, 1, 350, 'Blue', 'S', '', '', 3, '2022-10-17 07:26:04', '2022-10-18 07:27:52'),
(15, 8, 11, 1, 610, 'Blue', 'S', '', '', 3, '2022-10-17 07:26:04', '2022-10-18 07:27:54'),
(16, 9, 13, 1, 350, 'Blue', 'S', '', '', 3, '2022-10-18 07:26:50', '2022-10-18 07:27:56'),
(17, 10, 12, 1, 1400, 'Blue', 'S', 'print', 'tree-736885__480.jpg', 3, '2022-10-18 09:04:35', '2022-10-20 07:50:57'),
(18, 11, 11, 1, 610, 'Blue', 'S', '', '', 3, '2022-10-18 09:11:21', '2022-11-19 09:02:34'),
(19, 11, 13, 1, 350, 'Blue', 'S', '', '', 1, '2022-10-18 09:11:21', NULL),
(20, 12, 11, 1, 610, 'Blue', 'S', '', '', 0, '2022-11-18 06:35:41', NULL),
(21, 12, 16, 0, 300, 'Blue', 'S', 'ertyhujkl;', 'tree-736885__480.jpg', 3, '2022-11-18 06:35:41', '2022-11-19 09:02:27'),
(22, 13, 12, 2, 1400, '', '', 'hhh', 'photo-1506794778202-cad84cf45f1d.jpg', 3, '2022-11-19 09:01:16', '2022-11-19 09:02:14'),
(23, 13, 11, 1, 610, '', '', '', '', 3, '2022-11-19 09:01:16', '2022-11-19 09:02:25'),
(24, 13, 31, 1, 849, '', '', '', '', 3, '2022-11-19 09:01:16', '2022-11-19 09:02:21'),
(25, 14, 11, 1, 610, '', '', '', '', 1, '2022-11-19 09:14:56', NULL),
(26, 14, 21, 1, 750, '', '', 'black', 'f1.jpg', 0, '2022-11-19 09:14:56', NULL),
(27, 15, 21, 1, 750, '', '', 'aaa', 'f2.jpg', 1, '2022-11-19 09:30:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(5) NOT NULL,
  `c_id` int(5) NOT NULL,
  `amount` int(6) NOT NULL,
  `status` int(5) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `c_id`, `amount`, `status`, `date`) VALUES
(7, 2, 750, 0, '2022-10-17 08:37:31'),
(8, 2, 960, 0, '2022-10-18 07:26:04'),
(9, 1, 350, 0, '2022-10-18 07:26:50'),
(10, 1, 1400, 0, '2022-10-18 09:04:35'),
(11, 1, 960, 0, '2022-10-18 09:11:21'),
(12, 2, 610, 0, '2022-11-18 06:35:41'),
(13, 2, 4259, 0, '2022-11-19 09:01:16'),
(14, 2, 1360, 0, '2022-11-19 09:14:56'),
(15, 1, 750, 0, '2022-11-19 09:30:19');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(5) NOT NULL,
  `order_id` int(5) NOT NULL,
  `c_id` int(5) NOT NULL,
  `amount` int(10) NOT NULL,
  `name` text NOT NULL,
  `status` int(2) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `order_id`, `c_id`, `amount`, `name`, `status`, `date`) VALUES
(3, 7, 2, 750, 'nived', 1, '2022-10-17 08:37:31'),
(4, 8, 2, 960, 'adarsh', 1, '2022-10-18 07:26:04'),
(5, 9, 1, 350, 'nived', 1, '2022-10-18 07:26:50'),
(6, 10, 1, 1400, 'nived', 1, '2022-10-18 09:04:35'),
(7, 11, 1, 960, 'nived', 1, '2022-10-18 09:11:21'),
(8, 12, 2, 610, '', 1, '2022-11-18 06:35:41'),
(9, 13, 2, 4259, '', 1, '2022-11-19 09:01:16'),
(10, 14, 2, 1360, '', 1, '2022-11-19 09:14:56'),
(11, 15, 1, 750, '', 1, '2022-11-19 09:30:19');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(4) NOT NULL,
  `c_id` int(5) NOT NULL,
  `s_id` int(5) NOT NULL,
  `name` text NOT NULL,
  `price` int(5) NOT NULL,
  `discount` int(5) NOT NULL,
  `color` text NOT NULL,
  `quantity` int(5) NOT NULL,
  `description` text NOT NULL,
  `s_description` text NOT NULL,
  `return_policy` text NOT NULL,
  `customizable` int(2) NOT NULL,
  `status` int(2) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `c_id`, `s_id`, `name`, `price`, `discount`, `color`, `quantity`, `description`, `s_description`, `return_policy`, `customizable`, `status`, `date`) VALUES
(10, 1, 1, 't shirt full sleve', 520, 5, 'red', 0, 'red', 'Colors may slightly vary due to setting of the monitor\r\nWhite long Stripe on both shoulders.\r\nRegular Fit\r\nPackage contains: 1 T-Shirt\r\nMachine wash\r\n100% cotton', 'Easy 15 days return and exchange. Return Policies may vary based on products and promotions.', 1, 1, '0000-00-00 00:00:00'),
(11, 1, 1, 'Cotton Crew-Neck T-shirt', 610, 10, 'blue', 20, 'tshirt', 'Regular Fit\r\nPackage contains: 1 t-shirt\r\nMachine wash\r\nCotton', 'Easy 15 days return and exchange. Return Policies may vary based on products and promotions. ', 0, 1, '0000-00-00 00:00:00'),
(12, 3, 1, '3D Photo Crystal', 1400, 10, '', 199, 'Brand	CrazzyGIFT.com\r\nColour	Transparent\r\nProduct Dimensions	15.2L x 10.2W Centimeters\r\nItem Shape	Heart, Rectangle\r\nMounting Type	Wall Mount\r\n', 'Customized Gifts for Couple | Customized Gifts for Men with LED Light (Anniversary)', '15 days', 1, 1, '0000-00-00 00:00:00'),
(13, 3, 1, 'Photo Quote Name Wish Ceramic Magic Mug', 350, 20, 'white', 47, '\r\nBrand	Aousome\r\nMaterial	Ceramic\r\nColour	Magic Mug\r\nCapacity	325 Milliliters\r\nSpecial Feature	Heat Reveal Technology, Microwave Safe, With handle, Chip Resistant\r\nStyle	MUG', 'Aousome Personalized Gift Custom Photo Quote Name Wish Ceramic Magic Mug for Birthday Gift , Anniversary Gift Etc - 325 ml', '15 days', 0, 1, '0000-00-00 00:00:00'),
(14, 3, 1, ' Personalized Table Top Stand Couple Photo Frame', 450, 10, '0000', 198, '\r\nBrand	GiftsWale\r\nColour	Multicolored\r\nProduct Dimensions	26L x 1.5W Centimeters\r\nMounting Type	Tabletop\r\nFrame Material	Engineered Wood', 'GiftsWale Personalized Table Top Stand Couple Photo Frame | Best Gift For Anniversary, Girlfriend, Boyfriend, Husband, Wife | Customized It With Your Photos', '15 days', 1, 1, '0000-00-00 00:00:00'),
(15, 3, 1, 'Personalized Mobile Stand with Name and Calendar Blocks', 280, 20, 'wooden', 54, 'Color: Brown, Size : 15CM X 6CM X 10CM\r\nCALENDAR BLOCKS TO SET ANY DATE OF THE YEAR\r\nPERSONALISED WITH ANY NAME ON IT\r\nLONG LASTING TERMITE FREE, WELL POLISHED WOOD AND ASSURANCE OF NAME ENGRAVING TILL 50 YRS\r\nSIMPLY ORDER ON AMAZON AND EMAIL US THE NAME TO BE PRINTED ON THE STAND WITH THE ORDER ID', 'Crownlit Personalized Mobile Stand with Name and Calendar Blocks', 'no', 1, 1, '0000-00-00 00:00:00'),
(16, 3, 1, 'Personalized Aluminum Sipper Water Bottle', 300, 0, 'white', 19, 'Material: Aluminium | No. of Pieces: 1 | Capacity: 600ML | Colour: White\r\nIdeal Usage: Easy To Carry To Work , Office Or The Gym\r\nSpecial Feature 1: Leak-Proof\r\nSpecial Feature 2: Printed Gift for Your Beloved is a Unique Gift', 'PRINTZILLA Customize Personalized Aluminum Sipper Water Bottle (White, 600ML), Set of 1', 'no', 1, 1, '0000-00-00 00:00:00'),
(17, 5, 2, 'Personalized Indian Wedding Caricature with Wooden Stand', 750, 850, 'wooden', 50, 'Type : Caricature , Wooden \r\nStandSize : 8cm X 0.3cm X 20cm (l x b x h)\r\nMaterial : Wooden , Acrylic\r\nCountry of Origin : India', 'Capture the traditional essence of an Indian wedding, this cute caricature is perfect to display the moment of forever love and bliss. An ideal gift for anniversaries, the caricature comes with a wooden stand. Personalize with 2 faces for a quirky touch.', '15', 1, 1, '0000-00-00 00:00:00'),
(18, 5, 2, 'Personalized Wooden Birthday Gift for Girlfriend (6 X 4 Inch)', 600, 850, 'wooden', 25, 'Best Gift for Any Occasion – Birthday, Anniversary, Valentine’s Day, For Girls or Boys\r\nIncredible gifts India has collection of really incredible gifts that the recipient will remember you forever. Whether you are looking for birthday gift for girls or birthday gift for wife birthday or any kind of personalized gifts for birthday this is the perfect product for you.', 'Best Gift for Any Occasion – Birthday, Anniversary, Valentine’s Day, For Girls or Boys\r\nIncredible gifts India has collection of really incredible gifts that the recipient will remember you forever. Whether you are looking for birthday gift for girls or birthday gift for wife birthday or any kind of personalized gifts for birthday this is the perfect product for you.', 'no', 1, 1, '0000-00-00 00:00:00'),
(19, 5, 2, 'Crafts Natural Wooden Slice Engraved Photo Frame 5 Inches', 799, 1099, 'wooden', 20, '\r\nBrand	My Loving Crafts\r\nColour	Natural Wood\r\nItem Shape	Round\r\nMounting Type	Tabletop, Wall Mount\r\nFrame Material	Wood\r\n', 'Material and Size - Personalised Engraved Photo Frames are made of real wood\r\nEngraved Photo Frame - Made of natural wood, your photo and text will be engraved on wood and the end result will look amazing and this will be a best gift for your beloved\r\nREQUIRED PHOTO INSTRUCTIONS:- Photograph should be clear. Face should not be cropped. Front facing picture is a must. Closeup picture will give best output. Background should not be too dark or black. No other object should come in front of the picture.', 'no', 1, 1, '0000-00-00 00:00:00'),
(20, 5, 2, 'Heart Shape Wooden Photo Frame', 749, 850, 'wooden', 51, 'Material: Wood\r\nDimension: 6×6 inches\r\nFor personalization: Please provide 1 photo and message(50 characters).', 'it is displayed on a Personalized Heart-shaped Wooden Photo Frame. Engraved with a cherished picture, this will be the forever keepsake of the promise made to your beloved. ', 'no', 1, 1, '0000-00-00 00:00:00'),
(21, 4, 2, 'Handmade Pencil Sketch', 750, 800, 'b&w', 0, '100% Hand Drawn Sketch\r\nBlack/Brown Colour Frame\r\nDelivery Within 7 to 8 days\r\n100% satisfaction ensured.', 'Gift them a handmade sketch, it tells how much time you have invested to present a gift for them. It brings them close to your heart and they will remember you everytime they see your present.', 'no', 1, 1, '0000-00-00 00:00:00'),
(22, 4, 2, 'Handmade Sketches – Customized Gifts Online', 1250, 1500, 'aa', 50, 'Size of the frame –\r\nHeight – 16 inch\r\nWidth – 11 inch\r\n\r\nFrame type:\r\nFiber Photo Frame With Glass\r\n\r\nSketch made on A3 Paper', 'A classic, rich and ravishing gift for your loved ones.\r\nA really unxpected an', 'no', 1, 1, '0000-00-00 00:00:00'),
(23, 5, 2, 'Beech Wood Engraved Portraits - Wood Grain', 2499, 3000, 'wooden', 50, 'Material - Steam beech wood\r\nDimensions - 30.5 cm x 38 cm x 2 cm\r\nWeight - 1.150 kg', 'Wondering what gift to give to a loved one?\r\nThis handmade & personalized portrait is the perfect solution!\r\nSketched by talented artists, the portrait will capture every minute detail of the photo you upload\r\nA picture tells a thousand words. Its time to make them sing with this piece of art.\r\n', 'yes', 1, 1, '0000-00-00 00:00:00'),
(24, 10, 3, 'Boys Ethnic Black Artificial Leather Wallet  (3 Card Slots)', 349, 499, 'brown', 24, 'Boys Ethnic Black Artificial Leather Wallet  (3 Card Slots)', 'Boys Ethnic Black Artificial Leather Wallet  (3 Card Slots)', 'no', 1, 1, '0000-00-00 00:00:00'),
(25, 10, 3, 'Men Brown Genuine Leather RFID Wallet - Mini  (7 Card Slots)', 399, 459, 'brown', 52, 'Men Brown Genuine Leather RFID Wallet - Mini  (7 Card Slots)', 'Men Brown Genuine Leather RFID Wallet - Mini  (7 Card Slots)', 'no', 1, 1, '0000-00-00 00:00:00'),
(26, 10, 3, 'Personalised Iphone Mobile Cover', 599, 750, 'nill', 50, 'One Personalised Iphone  Mobile Cover\r\nMaterial- Polymers Plastic\r\nFor personalisation, please provide us with one image', 'One Personalised Iphone  Mobile Cover\r\nMaterial- Polymers Plastic\r\nFor personalisation, please provide us with one image', 'no', 1, 1, '0000-00-00 00:00:00'),
(27, 10, 3, 'Personalised Iphone Mobile Cover', 549, 699, 'nill', 41, 'One Personalised Iphone Max Mobile Cover\r\nMaterial- Polymers Plastic\r\nFor personalisation, please provide us with one image', 'One Personalised Iphone Max Mobile Cover\r\nMaterial- Polymers Plastic\r\nFor personalisation, please provide us with one image', 'no', 1, 1, '0000-00-00 00:00:00'),
(28, 10, 3, 'Personalised  Special LED Speaker', 1599, 1999, 'nill', 20, 'Handle with care.\r\nClean with a soft dry cloth.\r\nAbsolutely avoid contact with water.\r\nDo no over charge.', 'One Personalised Happy Anniversary Bluetooth Multi Colour LED Speaker\r\nTouch Lamp Portable Speaker\r\nWarm-White LED Table Lamp\r\nBuilt-in Smart Touchable Induction\r\nPotable Bluetooth 3W Speaker\r\nHigh Quality Wireless Stereo Speaker\r\nSupports Micro SD/TF Card & 3.5mm AUX Input For Outdoor/Indoor Usage\r\nSupport Hands-Free Calling\r\nBuilt-in 800mAh battery provides about 10 hours working time\r\nIt can be a wireless speaker, a table lamp or a music player\r\nFor personalisation, please provide us with one image', 'no', 1, 1, '0000-00-00 00:00:00'),
(29, 3, 3, 'Personalised Magic LED Mirror', 999, 1200, 'white', 20, 'Your gift may be delivered prior or after the chosen date of delivery.\r\ncourier product is delivered separately from other hand delivered products.\r\nNo deliveries are made on Sundays and National Holidays.\r\nOur courier partners do not call prior to delivering an order, so we recommend that you provide an address at which someone will be present to receive the package.\r\nThe delivery cannot be redirected to any other address.', 'Magic Mirror and frame with USB cable P00230_PERMAGIB002', 'no', 1, 1, '0000-00-00 00:00:00'),
(30, 3, 3, 'Heart Shadow Box With Night Lamp', 899, 1199, 'white', 24, 'Redirection to any other address is not possible\r\nExchange and Returns are not possible', '1 Heart Shadow Box With Night Lamp\r\nMaterial : Made of MDF board and LED lights\r\nSize: 12\"(L) x 12\"(B) x 12\"(H) cms\r\nCrave out your heart with this gift and send it to. your loved one\r\nNight lamp in heart pattern with your customized text\r\nA unique and unforgettable gift for your Loved ones', 'no', 0, 1, '0000-00-00 00:00:00'),
(31, 1, 1, 'Handicrafts Womens Hand Block Printed Cotton Mulmul Saree', 849, 999, 'nill', 11, 'FABRIC : Cotton Mulmul Fabric saree with Cotton Mulmul fabric Blouse pc || Work: Printed ,Block print ,Traditional Ethnic Look.\r\nLENGHT : The Total Lenght of the Saree is 6.50 mtrs including Blouse Piece. ||Saree Fabric Size : Length – 5.50 Mtrs (approx), Width - 44 Inches (approx) || Blouse Size : Unstitich Fabric - Length : 1 mtr (Approx), Width : 44 (Approx.) - Unstitched blouse fabric comes with saree so you can make as you like.', 'FABRIC : Cotton Mulmul Fabric saree with Cotton Mulmul fabric Blouse pc || Work: Printed ,Block print ,Traditional Ethnic Look.\r\nLENGHT : The Total Lenght of the Saree is 6.50 mtrs including Blouse Piece. ||Saree Fabric Size : Length – 5.50 Mtrs (approx), Width - 44\" Inches (approx) || Blouse Size : Unstitich Fabric - Length : 1 mtr (Approx), Width : 44\" (Approx.) - Unstitched blouse fabric comes with saree so you can make as you like.', 'no', 0, 1, '0000-00-00 00:00:00'),
(33, 1, 1, 'Womens Hand Block Printed Cotton Mulmul Saree', 749, 899, 'nill', 12, 'STYLE: Beautiful Traditional Ethnic Indian Wear Saree with Blouse Piece .This Saree gives Ethnic Indian look. This sari is great for wearing purpose. FABRIC : Cotton Mulmul Fabric saree with Cotton Mulmul fabric Blouse pc || Work: Printed ,Block print ,Traditional Ethnic Look.', 'STYLE: Beautiful Traditional Ethnic Indian Wear Saree with Blouse Piece .This Saree gives Ethnic Indian look. This sari is great for wearing purpose. FABRIC : Cotton Mulmul Fabric saree with Cotton Mulmul fabric Blouse pc || Work: Printed ,Block print ,Traditional Ethnic Look.', 'no', 0, 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `p_image`
--

CREATE TABLE `p_image` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL,
  `p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `p_image`
--

INSERT INTO `p_image` (`id`, `image`, `p_id`) VALUES
(16, 'red-MODEL.jpg', 10),
(17, '-473Wx593H-464051185-red-MODEL4.jpg', 10),
(18, '-1117Wx1400H-464051185-red-MODEL4.jpg', 10),
(19, 'red-MODEL.jpg', 10),
(20, '-473Wx593H-464051185-red-MODEL4.jpg', 10),
(21, '-473Wx593H-463872825-blue-MODEL3 (1).jpg', 11),
(22, '-473Wx593H-463872825-blue-MODEL.jpg', 11),
(23, '-473Wx593H-463872825-blue-MODEL.jpg', 11),
(24, '-473Wx593H-463872825-blue-MODEL3.jpg', 11),
(25, '-473Wx593H-463872825-blue-MODEL.jpg', 11),
(26, '61Z+mCqSJOL._SX450_.jpg', 12),
(27, '61Z+mCqSJOL._SX450_.jpg', 12),
(28, '61Z+mCqSJOL._SX450_.jpg', 12),
(29, '61Z+mCqSJOL._SX450_.jpg', 12),
(30, '61Z+mCqSJOL._SX450_.jpg', 12),
(31, '41CH0PwJ3oL.jpg', 13),
(32, '41CH0PwJ3oL.jpg', 13),
(33, '41CH0PwJ3oL.jpg', 13),
(34, '41CH0PwJ3oL.jpg', 13),
(35, '41CH0PwJ3oL.jpg', 13),
(36, 'p3.jpg', 14),
(37, 'p3.jpg', 14),
(38, 'p3.jpg', 14),
(39, 'p3.jpg', 14),
(40, 'p3.jpg', 14),
(41, 'p4.webp', 15),
(42, 'p4.webp', 15),
(43, 'p4.webp', 15),
(44, 'p4.webp', 15),
(45, 'p4.webp', 15),
(46, 'p5.jpg', 16),
(47, 'p5.jpg', 16),
(48, 'p5.jpg', 16),
(49, 'p5.jpg', 16),
(50, 'p5.jpg', 16),
(51, 'w1.webp', 17),
(52, 'w1a.jpg', 17),
(53, 'w1.webp', 17),
(54, 'w1a.jpg', 17),
(55, 'w1.webp', 17),
(56, 'w2.webp', 18),
(57, 'w2a.webp', 18),
(58, 'wa3.webp', 18),
(59, 'w2a.webp', 18),
(60, 'w2.webp', 18),
(61, 'w3.jpg', 19),
(62, 'w3a.jpg', 19),
(63, 'w3s.jpg', 19),
(64, 'w3a.jpg', 19),
(65, 'w3.jpg', 19),
(66, 'w4a.jpg', 20),
(67, 'w4.jpg', 20),
(68, 'w5s.jpg', 20),
(69, 'w4a.jpg', 20),
(70, 'w4.jpg', 20),
(71, 'p1a.jpg', 21),
(72, 'p1.jpg', 21),
(73, 'p1.jpg', 21),
(74, 'p1a.jpg', 21),
(75, 'p1.jpg', 21),
(76, '002.webp', 22),
(77, '002.webp', 22),
(78, '002.webp', 22),
(79, '002.webp', 22),
(80, '002.webp', 22),
(81, 'w6.webp', 23),
(82, 'w6a.webp', 23),
(83, 'w6a.webp', 23),
(84, 'w6.webp', 23),
(85, 'w6.webp', 23),
(86, 'customized-wallet-for-men-1-10-222-3-wallet-monistry-9-original-imaghdhue8mzsyaz.webp', 24),
(87, 'customized-wallet-for-men-1-10-222-3-wallet-monistry-9-original-imaghdhuuekyh3yg.webp', 24),
(88, 'customized-wallet-for-men-1-10-222-3-wallet-monistry-9-original-imaghdhue8mzsyaz.webp', 24),
(89, 'customized-wallet-for-men-1-10-222-3-wallet-monistry-9-original-imaghdhuuekyh3yg.webp', 24),
(90, 'customized-wallet-for-men-1-10-222-3-wallet-monistry-9-original-imaghdhue8mzsyaz.webp', 24),
(91, 'rfid-protected-top-grain-men-s-brown-premium-genuine-leather-original-imafxyh3dbpdzzux.webp', 25),
(92, 'rfid-protected-top-grain-men-s-brown-premium-genuine-leather-original-imafxyh34kyzgwhf.webp', 25),
(93, 'rfid-protected-top-grain-men-s-brown-premium-genuine-leather-original-imafxyh3dbpdzzux.webp', 25),
(94, 'rfid-protected-top-grain-men-s-brown-premium-genuine-leather-original-imafxyh34kyzgwhf.webp', 25),
(95, 'rfid-protected-top-grain-men-s-brown-premium-genuine-leather-original-imafxyh3dbpdzzux.webp', 25),
(96, 'g1.webp', 26),
(97, 'g1a.webp', 26),
(98, 'g1.webp', 26),
(99, 'g1a.webp', 26),
(100, 'g1.webp', 26),
(101, 'g2b.webp', 27),
(102, 'g2.webp', 27),
(103, 'g2a.webp', 27),
(104, 'g2.webp', 27),
(105, 'g2b.webp', 27),
(106, 'g3a.webp', 28),
(107, 'g3.webp', 28),
(108, 'g3.webp', 28),
(109, 'g3a.webp', 28),
(110, 'g3.webp', 28),
(111, 'g4.webp', 29),
(112, 'g4a.webp', 29),
(113, 'g4b.webp', 29),
(114, 'g4.webp', 29),
(115, 'g4b.webp', 29),
(116, 'g5.webp', 30),
(117, 'g5a.webp', 30),
(118, 'g5b.webp', 30),
(119, 'g5.webp', 30),
(120, 'g5a.webp', 30),
(121, 'f1.jpg', 31),
(122, 'f1a.jpg', 31),
(123, 'f1b.jpg', 31),
(124, 'f1.jpg', 31),
(125, 'f1a.jpg', 31),
(131, 'f2.jpg', 33),
(132, 'f2a.jpg', 33),
(133, 'f2b.jpg', 33),
(134, 'f2a.jpg', 33),
(135, 'f2b.jpg', 33);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `c_id` int(5) NOT NULL,
  `p_id` int(5) DEFAULT NULL,
  `rating` int(2) NOT NULL,
  `review` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `c_id`, `p_id`, `rating`, `review`, `date`) VALUES
(3, 2, 16, 5, 'saghahj', '2022-10-13 08:59:15'),
(4, 2, 16, 4, 'This is the best watch for this price. And it is very light and it is very comfortable in the hands. I love it', '2022-10-13 09:14:45'),
(5, 2, 19, 3, 'good', '2022-11-17 07:04:05'),
(6, 2, 19, 3, 'value for money\r\n', '2022-11-17 07:04:22'),
(7, 2, 18, 3, 'good', '2022-11-17 07:04:51'),
(8, 2, 19, 5, 'nyz\r\n', '2022-11-17 07:05:13'),
(9, 2, 17, 5, 'Nys product', '2022-11-17 07:05:41'),
(10, 2, 25, 4, 'Good', '2022-11-19 01:17:15'),
(11, 2, 25, 3, 'value for money\r\n\r\n', '2022-11-19 02:08:14'),
(12, 2, 26, 4, 'good', '2022-11-19 02:08:39'),
(13, 2, 26, 3, 'Better product', '2022-11-19 02:08:55'),
(14, 2, 28, 5, 'good', '2022-11-19 02:10:01'),
(15, 2, 28, 4, 'I like the quality and design is really cool.', '2022-11-19 02:11:04'),
(16, 2, 28, 4, 'Excellent product\r\n', '2022-11-19 02:11:36'),
(17, 2, 27, 5, 'Quality product', '2022-11-19 02:12:08'),
(18, 2, 24, 5, 'Really nyz metirial. better product', '2022-11-19 02:12:36'),
(19, 2, 24, 4, 'Its cool', '2022-11-19 02:12:49'),
(20, 2, 20, 4, 'good', '2022-11-19 02:13:35'),
(21, 2, 20, 3, 'Nyz product to gift', '2022-11-19 02:13:56'),
(22, 2, 23, 4, 'value for money', '2022-11-19 02:14:36'),
(23, 2, 23, 3, 'good', '2022-11-19 02:14:49'),
(24, 2, 22, 4, 'good', '2022-11-19 02:15:09'),
(25, 2, 22, 5, 'i like the work', '2022-11-19 02:15:24'),
(26, 2, 21, 4, 'good', '2022-11-19 02:15:54'),
(27, 2, 29, 4, 'I like the quality and design is really cool.', '2022-11-19 02:16:11'),
(28, 2, 29, 3, 'good', '2022-11-19 02:16:23'),
(29, 2, 14, 4, 'I like the quality and design is really cool.', '2022-11-19 02:16:40'),
(30, 2, 14, 2, 'good', '2022-11-19 02:16:51'),
(31, 2, 13, 3, 'good', '2022-11-19 02:17:08'),
(32, 2, 13, 5, 'I like the quality and design is really cool.', '2022-11-19 02:17:56'),
(33, 2, 15, 4, 'I like the quality and design is really cool.', '2022-11-19 02:18:21'),
(34, 2, 15, 2, 'average', '2022-11-19 02:18:31'),
(35, 2, 33, 5, 'good', '2022-11-20 07:45:57'),
(36, 2, 33, 2, 'not good', '2022-11-20 07:46:11'),
(37, 2, 11, 4, 'good', '2022-11-20 07:46:29'),
(38, 2, 10, 3, 'average', '2022-11-20 07:46:49'),
(39, 2, 33, 4, 'good', '2022-11-20 07:47:16'),
(40, 2, 31, 5, 'value for money', '2022-11-20 07:47:40');

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `id` int(5) NOT NULL,
  `name` text NOT NULL,
  `shop_name` text NOT NULL,
  `phone` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `address` text NOT NULL,
  `license_no` text NOT NULL,
  `status` int(2) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`id`, `name`, `shop_name`, `phone`, `email`, `password`, `address`, `license_no`, `status`, `date`) VALUES
(1, 'sandy', 'sandy sellers', '8521479630', 'sandy@gmail.com', 'abc', 'palakkad kerala', '1234567890', 1, '0000-00-00'),
(2, 'sam', 'clpas', '9852146320', 'sam@gmail.com', 'abc', 'palakkad', 'as411552', 1, '2022-10-22'),
(3, 'sanju', 'sanjus', '7854963214', 'sanju@gmail.com', 'abc', 'kerala', 'ksa124d4', 1, '2022-11-18');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(6) NOT NULL,
  `c_id` int(6) NOT NULL,
  `p_id` int(6) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `c_id`, `p_id`, `date`) VALUES
(28, 2, 31, '2022-11-20 11:43:23'),
(29, 2, 10, '2022-11-20 11:43:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordered_products`
--
ALTER TABLE `ordered_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `p_image`
--
ALTER TABLE `p_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ordered_products`
--
ALTER TABLE `ordered_products`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `p_image`
--
ALTER TABLE `p_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

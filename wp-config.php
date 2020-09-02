<?php
/**
 * Cấu hình cơ bản cho WordPress
 *
 * Trong quá trình cài đặt, file "wp-config.php" sẽ được tạo dựa trên nội dung 
 * mẫu của file này. Bạn không bắt buộc phải sử dụng giao diện web để cài đặt, 
 * chỉ cần lưu file này lại với tên "wp-config.php" và điền các thông tin cần thiết.
 *
 * File này chứa các thiết lập sau:
 *
 * * Thiết lập MySQL
 * * Các khóa bí mật
 * * Tiền tố cho các bảng database
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Thiết lập MySQL - Bạn có thể lấy các thông tin này từ host/server ** //
/** Tên database MySQL */
define( 'DB_NAME', 'inteco' );

/** Username của database */
define( 'DB_USER', 'root' );

/** Mật khẩu của database */
define( 'DB_PASSWORD', '' );

/** Hostname của database */
define( 'DB_HOST', 'localhost' );

/** Database charset sử dụng để tạo bảng database. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Kiểu database collate. Đừng thay đổi nếu không hiểu rõ. */
define('DB_COLLATE', '');

/**#@+
 * Khóa xác thực và salt.
 *
 * Thay đổi các giá trị dưới đây thành các khóa không trùng nhau!
 * Bạn có thể tạo ra các khóa này bằng công cụ
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Bạn có thể thay đổi chúng bất cứ lúc nào để vô hiệu hóa tất cả
 * các cookie hiện có. Điều này sẽ buộc tất cả người dùng phải đăng nhập lại.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'GgO!p{F+vhm773aia3J8rUJiANP_u7f@1o$A@Sa>%ad2fpdSqh5[m`3)T),j_opf' );
define( 'SECURE_AUTH_KEY',  ';tM;RE&=0BJn*>^xzeS~)bT+|t(<=v8f*JaIL~ IDPc-%o7PS/@sAn6+rhR(0/v%' );
define( 'LOGGED_IN_KEY',    '4-:4c6e_F?45:Ahd m_{g=xI8msNlV1fu#:|1g`ZC;i.`/~;MRt*dsv%Y%2Zqz}A' );
define( 'NONCE_KEY',        ' hZA+.c54qxLylCjBaaP}vBJn1.5QIG=%h:wGb[i thp0I(d<5#4I.asN97,L@*V' );
define( 'AUTH_SALT',        'dWy{2e-,<A]+#Lw?M%82S:ui}qjH{2@3rvI$k9 ~Ak,jfpa4+DOqy5]m&v3yvaA*' );
define( 'SECURE_AUTH_SALT', 'y[VTiwVP/>H8s60i|,<L0p&bktyG^dc7=HuW.:q1geaHZg oruM1&iR8s7.4j/$`' );
define( 'LOGGED_IN_SALT',   'wMc7NtW] }RaQ|LF 25r,^Pq0sh%FOkkJfvkiRT#K-{>!jOsrd;R7(Bd,#G}jHLd' );
define( 'NONCE_SALT',       'K9)85TS+CsU}xqG11s<lC2v@I{F& lcz(%Zx&DA%#wr5V>!)@oaHxezaxeMu2f;+' );

/**#@-*/

/**
 * Tiền tố cho bảng database.
 *
 * Đặt tiền tố cho bảng giúp bạn có thể cài nhiều site WordPress vào cùng một database.
 * Chỉ sử dụng số, ký tự và dấu gạch dưới!
 */
$table_prefix = 'asb_';

/**
 * Dành cho developer: Chế độ debug.
 *
 * Thay đổi hằng số này thành true sẽ làm hiện lên các thông báo trong quá trình phát triển.
 * Chúng tôi khuyến cáo các developer sử dụng WP_DEBUG trong quá trình phát triển plugin và theme.
 *
 * Để có thông tin về các hằng số khác có thể sử dụng khi debug, hãy xem tại Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Đó là tất cả thiết lập, ngưng sửa từ phần này trở xuống. Chúc bạn viết blog vui vẻ. */

/** Đường dẫn tuyệt đối đến thư mục cài đặt WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Thiết lập biến và include file. */
require_once(ABSPATH . 'wp-settings.php');

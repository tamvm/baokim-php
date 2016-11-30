<?php
//CẤU HÌNH TÀI KHOẢN (Configure account)
define('EMAIL_BUSINESS','dev.baokim@bk.vn');//Email Bảo kim
define('MERCHANT_ID','1234');                // Mã website tích hợp
define('SECURE_PASS','43284c9d2ed45ff1');   // Mật khẩu

// Cấu hình tài khoản tích hợp
define('API_USER','merchant');  //API USER
//define('API_PWD','2q1vYc8pJ57bAW9VjCnXH1htk3GOK');       //API PASSWORD
define('API_PWD','1234');       //API PASSWORD
define('PRIVATE_KEY_BAOKIM','-----BEGIN PRIVATE KEY-----
MIIEvgIBADANBgkqhkiG9w0BAQEFAASCBKgwggSkAgEAAoIBAQDZZBAIQz1UZtVm
p0Jwv0SnoIkGYdHUs7vzdfXYBs1wvznuLp/SfC/MHzHVQw7urN8qv+ZDxzTMgu2Q
3FhMOQ+LIoqYNnklm+5EFsE8hz01sZzg+uRBbyNEdcTa39I4X88OFr13KoJC6sBE
397+5HG1HPjip8a83v8G4/IPcna5/3ydVbJ9ZeMSUXP6ZyKAKay4M22/Wli7PLrm
1XNR9JgIuQLma74yCGkaXtCJQswjyYAmwDPpz4ZknSGuBYUmwaHMgrDOQsOXFW7/
7M2KbjenwggAW98f0f97AR2DEq9Eb5r8vzyHURnHGD3/noZxl993lM2foPI3SKBO
1KpSeXRzAgMBAAECggEANMINBgRTgQVH6xbSkAxLPCdAufTJeMZ56bcKB/h2qVMv
Wvejv/B1pSM489nHaPM5YeWam35f+PYZc5uWLkF23TxvyEsIEbGLHKktEmR73WkS
eqNI+/xd4cJ3GOtS2G2gEXpBVwdQ/657JPvz4YZNdjfmyxMOr02rNN/jIg6Uc8Tz
vbpGdtP49nhqcOUpbKEyUxdDo6TgLVgmLAKkGJVW40kwvU9hTTo6GXledLNtL2kD
l6gpVWAiT6xlTsD5m74YzsxCSjkh60NdYeUDYwMbv0WWH3kJq6qD063ac3i/i8H+
B5nGf4KbKg1bBjPLNymUj7RRnKjHr301i2u8LUQYuQKBgQD15YCoa5uHd6DHUXEK
kejU34Axznr3Gs6LqcisE7t0oQ9hB4s16U9f4DBHDOvnkLb0zkadwdEmwo/D/Tdf
5c/JEk8q/aO9Wk8uV4Bswnx1OV9uKMzMOZbv/So1DQg1aW1MgvRnj3SiKpDUkNwr
en4NT9tbH21SmVIO9Da5KpiFRwKBgQDiUrg1hp8EDaeZFTG9DvcwyTTrpD/YT9Wr
s/NtEnPMjy0NXWcEXwGzx90P+qjJ+J29Hk89QHON6S7o0X2lUIer3uXokc86ce76
5UIbR6u7R1T6TUNfwqwwNfIbgtFN4+7ybodPNZ5DWslKLqMr5wpwIOr7/U5ih7BH
JK0cSriddQKBgGXzNZiepOlRrBN3rMqZHFPGJrx/w3PYZXJ6fnz54WrFrD6qhglg
Jky2As4yiUyFL5XoQFcAGNtdJ4Y24lKcUb4oHTLR3qWPX+zy0ohFSpy/oNVnjSHP
bskpyeoc8R5UC8EBOpwFWnIx+8JmHSLZspGKXoQ1T3pDn0Yb8uRqyLnZAoGBAKdk
NwqfvwzobIU0v8ztPLbAmnuOyAndQlP0jJ6nfy5U1yWDZ6Y7/q5RrJcc9aosT76I
pGLRQKY9SYy5JQ0YOsBL5A/XiEXZ7r9ywSocIFAruhZG/wXcni4qOB9Q6i2J4Dk+
tqVHKv72LtrHE7hs8bNtJV+rQkZtxVtZLRA308PhAoGBALVEaYMRm97V+Tnsej6q
fuT/6oKHPqZpur2rNfEKVn5Aq2kmFrvyUhvXi0IAWQ/XS3XJ7faQnprrWT6pYiSy
2YQuaghlNG1SATVd5eUadq2pA8DuSzqWFa0Ac1IAyliBO2uLPL7LzuEKmmuQk0vI
TU2Q8idAb77K7mvVguA3LDhN
-----END PRIVATE KEY-----');

define('BAOKIM_API_SELLER_INFO','/payment/rest/payment_pro_api/get_seller_info');
define('BAOKIM_API_PAY_BY_CARD','/payment/rest/payment_pro_api/pay_by_card');
define('BAOKIM_API_PAYMENT','/payment/order/version11');

//define('BAOKIM_URL','https://www.baokim.vn');
//define('BAOKIM_URL','http://baokim.dev');
define('BAOKIM_URL','http://kiemthu.baokim.vn');

//Phương thức thanh toán bằng thẻ nội địa
define('PAYMENT_METHOD_TYPE_LOCAL_CARD', 1);
//Phương thức thanh toán bằng thẻ tín dụng quốc tế
define('PAYMENT_METHOD_TYPE_CREDIT_CARD', 2);
//Dịch vụ chuyển khoản online của các ngân hàng
define('PAYMENT_METHOD_TYPE_INTERNET_BANKING', 3);
//Dịch vụ chuyển khoản ATM
define('PAYMENT_METHOD_TYPE_ATM_TRANSFER', 4);
//Dịch vụ chuyển khoản truyền thống giữa các ngân hàng
define('PAYMENT_METHOD_TYPE_BANK_TRANSFER', 5);

?>
// 是否为正整数
var isPositiveInteger = function (s) {
    if (s <= 0) {
        return false;
    }
    var re = /^[0-9]+$/;
    return re.test(s)
};

// 验证手机号
var isMobile = function (mobile) {
    if (!mobile) return false;
    return /(^[1][3-8][0-9]{9}$)/.test(mobile);
};

// 验证QQ号码
var isQQ = function (qq) {
    if (!qq) {
        return false;
    }
    return qq.match(/[1-9][0-9]{4,}/);
};

// 验证邮箱
var isEmail = function (email) {
    if (!email) {
        return false;
    }
    return email.match(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/);
};
//验证传真
var isFax = function(fax){
    if(!fax){
        return false; 
    }
    return fax.match(/^(\d{3,4}-)?\d{7,8}$/);
};
// 验证网址
var isUrl = function (url) {
    if (!url) {
        return false;
    }
    var strRegex = "^((https|http|ftp|rtsp|mms)?://)"
        + "?(([0-9a-z_!~*'().&amp;=+$%-]+: )?[0-9a-z_!~*'().&amp;=+$%-]+@)?" //ftp的user@
        + "(([0-9]{1,3}\.){3}[0-9]{1,3}" // IP形式的URL- 199.194.52.184
        + "|" // 允许IP和DOMAIN（域名）
        + "([0-9a-z_!~*'()-]+\.)*" // 域名- www.
        + "([0-9a-z][0-9a-z-]{0,61})?[0-9a-z]\." // 二级域名
        + "[a-z]{2,6})" // first level domain- .com or .museum
        + "(:[0-9]{1,4})?" // 端口- :80
        + "((/?)|" // a slash isn't required if there is no file name
        + "(/[0-9a-z_!~*'().;?:@&amp;=+$,%#-]+)+/?)$";
    var regex = new RegExp(strRegex);
    // var regex = /^((https|http)?:\/\/)(?:(?:\w*?)\.|)(?:\w*?)\.(?:\w{2,4})(?:\?.*|\/.*|)$/ig;
    return regex.test(url);
};

// 验证电话号码（可以是固定电话号码或手机号码）
var isPhoneNumber = function (num) {
    if (!num) {
        return false;
    }
    var mobile = /(^[1][3-8][0-9]{9}$)/, phone1 = /^0\d{2}-?\d{8}$/, phone2 = /^0\d{3}-?\d{7,8}$/;
    return mobile.test(num) || phone1.test(num) || phone2.test(num);
};
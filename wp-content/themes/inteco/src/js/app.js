import global from "./global";
const controllers = {
};
const _find = (_class, _str) => {
    if (_class.length > 0) {
        let _array = null;
        for (let i = 0; i < _class.length; i++) {
            var n = _class[i].indexOf(_str);
            if (n > 0) {
                _array = _class[i].replace("_" + _str, "");
                break;
            }
        }
        return _array;
    } else {
        return null;
    }
};
const router = () => {
    const _class = document.body.className.replace(/-/g, "_").split(/\s+/);
    const controller = _find(_class, "ph");
    new global();
    if (controller !== null) {
        if (controllers[controller]) {
            new controllers[controller]();
        }
    }
};
router();

function Router() {
    this.routes = {};//用来保存路由
    this.currentUrl = '';//获取当前的hash
}
Router.prototype.route = function(path, callback) {
    this.routes[path] = callback || function(){};//给不同的hash设置不同的回调函数
};
Router.prototype.refresh = function() {
    this.currentUrl = location.hash.slice(1) || '/';//如果存在hash值则获取到，否则设置hash值为/
    this.routes[this.currentUrl]();//根据当前的hash值来调用相对应的回调函数
};
Router.prototype.refreshHash = function(hash) {
    return window.location.protocol + '//' + window.location.host + window.location.pathname + window.location.search + '#' + hash; //刷新后强制退回首页，hash变回对应的值
};
Router.prototype.init = function() {
    window.addEventListener('load', this.refresh.bind(this), false);
    window.addEventListener('hashchange', this.refresh.bind(this), false);//监听路由变化
    window.location.replace(this.refreshHash(this.currentUrl));
};
//给window对象挂载属性
window.Router = new Router();
window.Router.init();


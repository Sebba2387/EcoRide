export default class Route {
  constructor(url, title, pathHtml, pathJS = "", showSideBar = false) {
      this.url = url;
      this.title = title;
      this.pathHtml = pathHtml;
      this.pathJS = pathJS;
      this.showSideBar = showSideBar;
  }
}


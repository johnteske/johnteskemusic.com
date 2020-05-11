const { catMap, maybe, title, url: _url } = require("eleventy-lib");

module.exports = data => {
  const url = {
    base: _ => _url.base(data.site.baseUrl, _),
    asset: _ => _url.asset(data.site.baseUrl, _)
  };

  return `<!DOCTYPE html>
<html>
  <head>
    <title>${title(data.title, data.site.name)}</title>
    <link rel="stylesheet" href="${url.asset("/inter.css")}">
    <link rel="stylesheet" href="${url.asset("/style.css")}">
    <link rel="icon" type="image/x-icon" href="${url.asset("/favicon.ico")}">
  </head>
  <body>
    <header>
      <a href="${url.base("/")}"><h1>${data.site.name}</h1></a>
    </header>
    <nav>
      <a href="${url.base("performances")}">performances</a>
      <a href="${url.base("compositions")}">compositions</a>
      <a href="${url.base("about")}">about</a>
    </nav>
    <main>
      ${data.site.baseUrl}
      ${maybe(`<header><h2>${data.title}</h2></header>`, data.title)}
      ${data.content}
    </main>
    <footer>
      <ul>
        ${catMap(
          v => `<li><a href="${v.url}">${v.label}</a></li>`,
          data.contact
        )}
      </ul>
    </footer>
  </body>
</html>`;
};

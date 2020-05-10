const title = data =>
  [data.title, data.project, data.site.name].filter(Boolean).join(" - ");

const _withBaseUrl = baseUrl => url =>
  `/${baseUrl}/${url}`.replace(/\/+/g, "/");

module.exports = data => {
  const withBaseUrl = _withBaseUrl(data.site.baseUrl);
  return `<!DOCTYPE html>
<html>
  <head>
    <title>${title(data)}</title>
    <link rel="stylesheet" href="${withBaseUrl("/assets/inter.css")}">
    <link rel="stylesheet" href="${withBaseUrl("/assets/style.css")}">
    <link rel="icon" type="image/x-icon" href="${withBaseUrl("/assets/favicon.ico")}">
  </head>
  <body>
    <header>
      <a href="${withBaseUrl("/")}"><h1>${data.site.name}</h1></a>
    </header>
    <nav>
      <a href="${withBaseUrl("performances")}">performances</a>
      <a href="${withBaseUrl("compositions")}">compositions</a>
      <a href="${withBaseUrl("about")}">about</a>
    </nav>
    <main>
      ${data.title != null ? `<header><h2>${data.title}</h2></header>` : ""}
      ${data.content}
    </main>
    <footer>
      <ul>
        ${data.contact
          .map(v => `<li><a href="${v.url}">${v.label}</a></li>`)
          .join("")}
      </ul>
    </footer>
  </body>
</html>`;
};

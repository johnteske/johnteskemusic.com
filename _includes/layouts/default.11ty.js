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
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <style>
      html {
        font-family: 'Roboto';
      }
      body {
        margin: 1em;
        max-width: 45em;
      }
      .embed {
          position: relative;
          padding: 0;
          padding-bottom: 56.25%; /* 16:9 ratio*/
          height: 0;
          overflow: hidden;
          margin: 1em 0;
      }

      .embed iframe,
      .embed object,
      .embed embed {
          position: absolute;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
      }
      ul {
        padding-inline-start: 1em;
      }
      footer {
        border-top: 1px solid black;
      }
  </style>
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

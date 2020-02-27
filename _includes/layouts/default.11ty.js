const title = data =>
  [data.title, data.project, data.site.name].filter(Boolean).join(" - ");

module.exports = data =>
  `<!DOCTYPE html>
<html>
  <head>
    <title>${title(data)}</title>
  </head>
  <body>
    <header>
      <a href="/"><h1>${data.site.name}</h1></a>
    </header>
    <nav>
      <a href="${site.baseUrl}/performances">performances</a>
      <a href="${site.baseUrl}/compositions">compositions</a>
      <a href="${site.baseUrl}/about">about</a>
    </nav>
    <main>
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

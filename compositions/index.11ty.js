const { get } = require("lodash");
const { maybe } = require("eleventy-lib");

const duration = (d) =>
  maybe((m) => `${m}&prime;`, get(d, "minutes")) +
  maybe((m) => `${m}&Prime;`, get(d, "seconds"));

const recordingLink = (url) => {
  let text = "link";
  if (url.includes("spotify")) text = "spotify";
  if (url.includes("bandcamp")) text = "bandcamp";
  return `<a href="${url}">${text}</a>`;
};

module.exports = class {
  data() {
    return { title: "Compositions" };
  }
  render(data) {
    return `<ul>
      ${Object.keys(data.compositions)
        .reverse()
        .map((key) => {
          const c = data.compositions[key];
          return `<li>
            ${c.year}
            <em>${c.title}</em>
            ${maybe((i) => `for ${i}`, get(c, "instrumentation.short"))}
            ${duration(c.duration)}
            ${maybe(
              (url) => `<a href="${url}">audio</a>`,
              get(c, "links.audio")
            )}
            ${maybe(
              (url) => `<a href="${url}">video</a>`,
              get(c, "links.video")
            )}
         </li>`;
        })
        .join("")}</ul>
    <h2>Recordings</h2>
    <ul>${data.recordings
      .sort((a, b) => {
        return a.releaseDate - b.releasDate;
      })
      .reverse()
      .map(
        (r) =>
          `<li>${r.releaseDate} <em>${r.title}</em> ${r.urls
            .map(recordingLink)
            .join(" ")}</li>`
      )
      .join("")}</ul>`;
  }
};

const { get } = require("lodash");

const maybe = (t, v) => (v != null ? t(v) : "");

const duration = d =>
  maybe(m => `${m}&prime;`, get(d, "minutes")) +
  maybe(m => `${m}&Prime;`, get(d, "seconds"));

module.exports = class {
  data() {
    return { title: "Compositions" };
  }
  render(data) {
    return `<ul>
      ${Object.keys(data.compositions)
        .reverse()
        .map(key => {
          const c = data.compositions[key];
          return `<li>
            ${c.year}
            <em>${c.title}</em>
            ${maybe(i => `for ${i}`, get(c, "instrumentation.short"))}
            ${duration(c.duration)}
            ${maybe(url => `<a href="${url}">audio</a>`, get(c, "links.audio"))}
            ${maybe(url => `<a href="${url}">video</a>`, get(c, "links.video"))}
         </li>`;
        })
        .join("")}</ul>`;
  }
};

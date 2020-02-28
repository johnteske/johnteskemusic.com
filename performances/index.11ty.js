const { chunk } = require("lodash");
const { maybe } = require("../util");

// TODO date is in JSON, in ISO format, and
// does not need to be parsed from the filename
const date = yymmdd =>
  `20${chunk(yymmdd, 2)
    .map(v => v.join(""))
    .join("-")}`;

module.exports = class {
  data() {
    return { title: "Performances" };
  }
  render(data) {
    return `<ul>
      ${Object.keys(data.performances)
        .reverse()
        .map(key => {
          const p = data.performances[key];
          return `<li>
            ${date(key.split("-")[0])}
            ${p.title}
          </li>`;
        })
        .join("")}</ul>`;
  }
};

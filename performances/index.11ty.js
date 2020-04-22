const { chunk } = require("lodash");
const moment = require("moment");
const { maybe } = require("../util");

const now = moment().format("YYYY-MM-DD");

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
          const _date = date(key.split("-")[0]);
          return `<li>
            ${_date}
            ${now}
            ${p.title}${
            moment(_date).isAfter(now)
              ? `<br />${p.time}<br /><a href="${p.url}">${p.address}</a>`
              : ""
          }
          </li>`;
        })
        .join("")}</ul>`;
  }
};

const { chunk } = require("lodash");
const moment = require("moment");
const { maybe } = require("../util");

const format = "YYYY-MM-DD";
const now = moment().format(format);
const date = yymmdd => moment("20" + yymmdd).format(format);

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

const { chunk } = require("lodash");
const moment = require("moment");
const { maybe } = require("../util");

const format = "YYYY-MM-DD";
const now = moment().format(format);
const date = yyyymmdd => moment(yyyymmdd).format(format);

module.exports = class {
  data() {
    return { title: "Performances" };
  }
  async render(data) {
    const performances = await data.performances
    return `<ul>
      ${performances
        .reverse()
        .map(p => {
          return `<li>
            ${date(p.date)}
            ${p.title}${
            moment(p.date).isAfter(now)
              ? `<br />${p.time}<br /><a href="${p.url}">${p.address}</a>`
              : ""
          }
          </li>`;
        })
        .join("")}</ul>`;
  }
};

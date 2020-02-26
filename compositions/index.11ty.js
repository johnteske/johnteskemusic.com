module.exports = class {
  data() {
    return { title: "Compositions" };
  }
  render(data) {
    return Object.keys(data.compositions).map(
      key => data.compositions[key].title
    );
  }
};

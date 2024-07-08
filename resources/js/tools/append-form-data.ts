export default {
  append: (params: object, form: object, prop: string) => {
    form[prop] && (params[prop] = form[prop]);
  },
  appendRange: (params: object, form: object, prop: string, propNames: string[] = ["min", "max"]) => {
    propNames.forEach((name, index) => {
      form[prop][index] && (params[name] = form[prop][index]);
    })
  }
};

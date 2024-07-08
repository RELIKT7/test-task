import {ElNotification} from "element-plus";
import Apartment from "../models/Apartment";

export default {
  get: async (params: object): Array<Apartment> => {
    let data: Array<Apartment> = [];

    await window.axios
      .get(
        "/api/apartment",
        {params},
      )
      .then(response => data = response.data
        .map(row =>
          new Apartment(row.name, row.bedrooms, row.bathrooms, row.storeys, row.garages, row.price)
        ))
      .catch(error => {
        ElNotification({
          title: "Error",
          message: `${error.statusCode}: ${error.message}`,
          position: "bottom-right",
          type: "error",
        });
      });

    return data;
  },
};

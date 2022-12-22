import { Refine } from "@pankod/refine-core";
import {
  notificationProvider,
  Layout,
  ReadyPage,
  ErrorComponent,
} from "@pankod/refine-antd";

import dataProvider from "@pankod/refine-simple-rest";
import routerProvider from "@pankod/refine-react-router-v6";
import { VEdit, VList } from "pages/vehicles";
import axios from "axios";
const axiosInstance = axios.create();
import authProvider from "./auth-provider";
//  api url
const API_URL = "http://localhost:8902/api";
//
axiosInstance.interceptors.request.use(
  // Here we can perform any function we'd like on the request
  (request: AxiosRequestConfig) => {
    // Retrieve the token from local storage
    const token = JSON.parse(localStorage.getItem("auth"));
    // Check if the header property exists
    if (request.headers) {
      // Set the Authorization header if it exists
      request.headers[
        "Authorization"
      ] = `Bearer ${token}`;
    } else {
      // Create the headers property if it does not exist
      request.headers = {
        Authorization: `Bearer ${token}`,
      };
    }

    return request;
  },
);


const mockUsers = [
  { username: "vecfleet", token: "123" }
];


return (
  <Refine
    authProvider={authProvider}
    dataProvider={dataProvider(API_URL)}
    notificationProvider={notificationProvider}
    Layout={Layout}
    ReadyPage={ReadyPage}
    catchAll={<ErrorComponent />}
    routerProvider={routerProvider}
    resources={[
      {
        name: "vehicles",
        list: VList,
        edit: VEdit
      },
    ]}
  />
);
}

export default App;

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
// import authProvider from "./auth-provider";
//  api url
const API_URL = "http://localhost:8902/api";


// {
//   "access_token": "1|0wmCWhz41g695Eh0P7fZjNBzKdX377SmgsfoHYxu",
//   "token_type": "Bearer"
// }

//
// axiosInstance.interceptors.request.use(
//   // Here we can perform any function we'd like on the request
//   (request: AxiosRequestConfig) => {
//     const access_token = "2|BNfly6GDNxqJL3hcm9DSwotUZ2AY8VQEQYUus8TA";
//     const token_type = "Bearer";
//     // Retrieve the token from local storage
//     // const token = token_type;
//     // Check if the header property exists
//     if (request.headers) {
//       // Set the Authorization header if it exists
//       request.headers[
//         "Authorization"
//       ] = `Bearer ${access_token}`;
//     } else {
//       // Create the headers property if it does not exist
//       request.headers = {
//         Authorization: `Bearer ${access_token}`,
//       };
//     }

//     return request;
//   },
// );


const mockUsers = [
  { username: "vecfleet", token: "123" }
];


const App = () => {
  return (
    <Refine
      // authProvider={authProvider}
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

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

function App() {
  return (
    <Refine
      dataProvider={dataProvider("http://localhost:8902/api")}
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

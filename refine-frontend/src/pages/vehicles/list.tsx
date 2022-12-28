import { IResourceComponentsProps, useMany } from "@pankod/refine-core";
import {
  List,
  Table,
  TextField,
  useTable,
  getDefaultSortOrder,
  Space,
  EditButton,
  DeleteButton,
  TagField,
  ShowButton,
  useSelect,
  Select,
  FilterDropdown,
} from "@pankod/refine-antd";
import { IVBrand, IVehicle, IVType } from "interfaces";

export const VList: React.FC<IResourceComponentsProps> = () => {
  const { tableProps, sorter } = useTable<IVehicle>({
    initialSorter: [
      {
        field: "id",
        order: "desc",
      },
    ],
  });
  const { selectProps: brandSelectPorp } = useSelect<IVBrand>({
    resource: "brands",
    optionLabel: "Brand",
    optionValue: "id",
  });
  const { selectProps: modelSelectProps } = useSelect<IVehicle>({
    resource: "vehicles",
    optionLabel: "Model",
    optionValue: "model",
  });
  return (
    <List>
      <Table {...tableProps} rowKey="id">
        <Table.Column
          dataIndex="id"
          key="id"
          title="ID"
          render={(value) => <TextField value={value} />}
          defaultSortOrder={getDefaultSortOrder("id", sorter)}
          sorter
        />
        <Table.Column
          dataIndex={["type", "type"]}
          key="type_id"
          title="Type"
          render={(value) => <TextField value={value} />}
          defaultSortOrder={getDefaultSortOrder("type_id", sorter)}
        />
        <Table.Column
          dataIndex="wheels"
          key="wheels"
          title="Wheels"
          render={(value) => <TextField value={value} />}
          defaultSortOrder={getDefaultSortOrder("wheels", sorter)}
          sorter
        />
        <Table.Column
          dataIndex={["brand", "brand"]}
          key="brand_id"
          title="Brand"
          render={(value) => <TextField value={value} />}
          defaultSortOrder={getDefaultSortOrder("brand_id", sorter)}
          sorter
        />
        <Table.Column
          dataIndex="model"
          key="model"
          title="Model Name"
          render={(value) => <TextField value={value} />}
          defaultSortOrder={getDefaultSortOrder("model", sorter)}
          sorter
        />

        <Table.Column
          dataIndex="patent"
          key="patent"
          title="Patent"
          render={(value) => <TagField value={value} />}
          defaultSortOrder={getDefaultSortOrder("patent", sorter)}
          sorter
        />
        <Table.Column
          dataIndex="chassis"
          key="chassis"
          title="Chassis"
          render={(value) => <TagField value={value} />}
          defaultSortOrder={getDefaultSortOrder("chassis", sorter)}
          sorter
        />
        <Table.Column
          dataIndex="km_traveled"
          key="km_traveled"
          title="KM Traveled"
          render={(value) => <TextField value={value} />}
          defaultSortOrder={getDefaultSortOrder("km_traveled", sorter)}
          sorter
        />

        <Table.Column<IVehicle>
          title="Actions"
          dataIndex="actions"
          render={(_, record) => (
            <Space>
              <EditButton hideText size="small" recordItemId={record.id} />
              <ShowButton hideText size="small" recordItemId={record.id} />
              <DeleteButton hideText size="small" recordItemId={record.id} />
            </Space>
          )}
        />
      </Table>
    </List>
  );
};

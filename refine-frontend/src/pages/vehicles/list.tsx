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
import { IVehicle, IVType } from "interfaces";

export const VList: React.FC<IResourceComponentsProps> = () => {
  const { tableProps, sorter } = useTable<IVehicle>({
    initialSorter: [
      {
        field: "id",
        order: "desc",
      },
    ],
  });
  const { selectProps: typesSelectProps } = useSelect<IVType>({
    resource: "types",
    // label: "Type",
    // name: "type_id"
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
          // filter by type
          filterDropdown={(props) => (
            <FilterDropdown {...props}>
              <Select
              style={{ minWidth: 200 }}
              mode="multiple"
              placeholder="Select Type"
              // label="Type"
              {...typesSelectProps}
              />
            </FilterDropdown>
          )}
        />
        <Table.Column
          dataIndex="wheels"
          key="wheels"
          title="Wheels"
          render={(value) => <TextField value={value} />}
          defaultSortOrder={getDefaultSortOrder("id", sorter)}
          sorter
        />
        <Table.Column
          dataIndex={["brand", "brand"]}
          key="brand_id"
          title="Brand"
          render={(value) => <TextField value={value} />}
          defaultSortOrder={getDefaultSortOrder("id", sorter)}
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
          defaultSortOrder={getDefaultSortOrder("patent", sorter)}
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

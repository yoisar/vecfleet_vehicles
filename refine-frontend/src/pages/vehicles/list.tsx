import { CrudFilters, HttpError, IResourceComponentsProps, useMany } from "@pankod/refine-core";
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
  Icons,
  Input,
  Row,
  Col,
  Card, Form, FormProps, Button,
} from "@pankod/refine-antd";
import { IVBrand, IVehicle, IVehicleFilterVariables, IVType } from "interfaces";

export const VList: React.FC<IResourceComponentsProps> = () => {
  const { tableProps, sorter, searchFormProps } = useTable<IVehicle,
    HttpError,
    IVehicleFilterVariables>({
      onSearch: (params) => {
        const filters: CrudFilters = [];
        const { q, brand, model } = params;

        filters.push(
          {
            field: "q",
            operator: "eq",
            value: q,
          },
          {
            field: "brand_id",
            operator: "eq",
            value: brand,
          },
          {
            field: "model",
            operator: "eq",
            value: model,
          },
        );

        return filters;
      },
      initialSorter: [
        {
          field: "id",
          order: "asc",
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
    <Row gutter={[16, 16]}>
      <Col lg={6} xs={24}>
        <Card title="Filters">
          <Filter formProps={searchFormProps} />
        </Card>
      </Col>
      <Col lg={18} xs={24}>
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
              title="Model"
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
        </List> </Col>
    </Row>
  );
};

const Filter: React.FC<{ formProps: FormProps }> = ({ formProps }) => {
  const { selectProps: brandSelectProps } = useSelect<IVBrand>({
    resource: "brands",
    optionLabel: "brand",
    optionValue: "id",
  });

  return (
    <Form layout="vertical" {...formProps}>
      <Form.Item label="Search" name="q">
        <Input
          placeholder="ID, Marca, Modelo"
          prefix={<Icons.SearchOutlined />}
        />
      </Form.Item>
      <Form.Item label="Model" name="model">
        <Input
          placeholder="Model"
          prefix={<Icons.SearchOutlined />}
        />
      </Form.Item>

      <Form.Item label="Brand" name="brand">
        <Select
          {...brandSelectProps}
          allowClear
          placeholder="Search Brands"
        />
      </Form.Item>
      <Form.Item>
                <Button htmlType="submit" type="primary">
                    Filter
                </Button>
            </Form.Item>

    </Form>
  );
};

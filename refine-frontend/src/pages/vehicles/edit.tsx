import { IResourceComponentsProps } from "@pankod/refine-core";
import {
  Edit,
  Form,
  Input,
  Select,
  useForm,
  useSelect,
} from "@pankod/refine-antd";

import MDEditor from "@uiw/react-md-editor";

import { IVBrand, IVehicle, IVType } from "interfaces";

export const VEdit: React.FC<IResourceComponentsProps> = () => {
  const { formProps, saveButtonProps, queryResult } = useForm<IVehicle>();

  const { selectProps: typeSelectProps } = useSelect<IVType>({
    resource: "types",
    optionLabel: "type",
    optionValue: "id",
    defaultValue: queryResult?.data?.data.type.id,
  });
  const { selectProps: brandSelectProps } = useSelect<IVBrand>({
    resource: "brands",
    optionLabel: "brand",
    optionValue: "id",
    defaultValue: queryResult?.data?.data.brand.id,

  });

  return (
    <Edit saveButtonProps={saveButtonProps}>
      <Form {...formProps} layout="vertical">
        <Form.Item
          label="Type"
          name={["type", "type"]}
          rules={[
            {
              required: true,
            },
          ]}
        >
          <Select {...typeSelectProps} />
        </Form.Item>
        <Form.Item
          label="Wheels"
          name="wheels"
          rules={[
            {
              required: true,
            },
          ]}
        >
          <Input />
        </Form.Item>
        <Form.Item
          label="Brand"
          name={["brand", "brand"]}
          rules={[
            {
              required: true,
            },
          ]}
        >
          <Select {...brandSelectProps} />
        </Form.Item>
        <Form.Item
          label="Model"
          name="model"
          rules={[
            {
              required: true,
            },
          ]}
        >
          <Input />
        </Form.Item>
        <Form.Item
          label="Patent"
          name="patent"
          rules={[
            {
              required: true,
            },
          ]}
        >
          <Input />
        </Form.Item>
        <Form.Item
          label="Chassis"
          name="chassis"
          rules={[
            {
              required: true,
            },
          ]}
        >
          <Input />
        </Form.Item>
        <Form.Item
          label="Km traveled"
          name="km_traveled"
          rules={[
            {
              required: true,
            },
          ]}
        >
          <Input />
        </Form.Item>


      </Form>
    </Edit>
  );
};

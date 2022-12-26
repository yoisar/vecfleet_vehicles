import { IResourceComponentsProps } from "@pankod/refine-core";
import {
  Create,
  Form,
  Input,
  Select,
  useSelect,
  useForm,
} from "@pankod/refine-antd";

import MDEditor from "@uiw/react-md-editor";

import { IPost, ICategory, IVType, IVehicle, IVBrand } from "interfaces";

export const VCreate: React.FC<IResourceComponentsProps> = () => {
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
    <Create saveButtonProps={saveButtonProps}>
     <Form {...formProps} layout="vertical">
        <Form.Item
          label="Type"
          name="type_id"
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
          name="brand_id"
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
    </Create>
  );
};

import { IResourceComponentsProps, useOne, useShow } from "@pankod/refine-core";
import { Show, Typography, Tag, MarkdownField } from "@pankod/refine-antd";

import { IPost, ICategory, IVehicle, IVType, IVBrand } from "interfaces";

const { Title, Text } = Typography;

export const VShow: React.FC<IResourceComponentsProps> = () => {
  const { queryResult } = useShow<IVehicle>();
  const { data, isLoading } = queryResult;
  const record = data?.data;

  const { data: brandData } = useOne<IVBrand>({
    resource: "brands",
    id: record?.brand.id ?? "",
    queryOptions: {
      enabled: !!record?.brand.id,
    },
  });

  return (
    <Show isLoading={isLoading}>
      <Title level={5}>Type</Title>
      <Text>{record?.type.type}</Text>

      <Title level={5}>Wheels</Title>
      <Text>
        <Tag>{record?.wheels}</Tag>
      </Text>

      <Title level={5}>Brand</Title>
      <Text>{brandData?.data.brand}</Text>
      
      <Title level={5}>Model</Title>
      <Text>{record?.model}</Text>
      
      <Title level={5}>Patent</Title>
      <Text>{record?.patent}</Text>
      
      <Title level={5}>Chassis</Title>
      <Text>{record?.chassis}</Text>
      
      <Title level={5}>KM Traveled</Title>
      <Text>{record?.km_traveled}</Text>

      
    </Show>
  );
};

<?php
namespace Aws\CloudFormation;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS CloudFormation** service.
 *
 * @method \Aws\Result cancelUpdateStack(array $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelUpdateStackAsync(array $args = [])
 * @method \Aws\Result createStack(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createStackAsync(array $args = [])
 * @method \Aws\Result deleteStack(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteStackAsync(array $args = [])
 * @method \Aws\Result describeStackEvents(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeStackEventsAsync(array $args = [])
 * @method \Aws\Result describeStackResource(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeStackResourceAsync(array $args = [])
 * @method \Aws\Result describeStackResources(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeStackResourcesAsync(array $args = [])
 * @method \Aws\Result describeStacks(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeStacksAsync(array $args = [])
 * @method \Aws\Result estimateTemplateCost(array $args = [])
 * @method \GuzzleHttp\Promise\Promise estimateTemplateCostAsync(array $args = [])
 * @method \Aws\Result getStackPolicy(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getStackPolicyAsync(array $args = [])
 * @method \Aws\Result getTemplate(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getTemplateAsync(array $args = [])
 * @method \Aws\Result getTemplateSummary(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getTemplateSummaryAsync(array $args = [])
 * @method \Aws\Result listStackResources(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listStackResourcesAsync(array $args = [])
 * @method \Aws\Result listStacks(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listStacksAsync(array $args = [])
 * @method \Aws\Result setStackPolicy(array $args = [])
 * @method \GuzzleHttp\Promise\Promise setStackPolicyAsync(array $args = [])
 * @method \Aws\Result signalResource(array $args = [])
 * @method \GuzzleHttp\Promise\Promise signalResourceAsync(array $args = [])
 * @method \Aws\Result updateStack(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateStackAsync(array $args = [])
 * @method \Aws\Result validateTemplate(array $args = [])
 * @method \GuzzleHttp\Promise\Promise validateTemplateAsync(array $args = [])
 */
class CloudFormationClient extends AwsClient {}

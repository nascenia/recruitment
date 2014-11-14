<?php
/**
 * @author Rafi Adnan <rafi@nascenia.com>
 * @since 2014-11-11
 * @version 2014-11-11
 */

namespace NasRecPublic\Form;

use Doctrine\ORM\EntityRepository;
use Nascenia\Zend\Form\Form;
use Nascenia\Zend\Hydrator;
use Nascenia\Zend\Hydrator\Strategy\EntityCollection;
use RdnUpload\ContainerInterface;
use RdnUpload\Hydrator\Strategy;
use Zend\InputFilter\InputFilterProviderInterface;

class Application extends Form implements InputFilterProviderInterface
{
    /**
     * @var EntityRepository
     */
    protected $applications;

    /**
     * @var EntityRepository
     */
    protected $positions;

    /**
     * @var ContainerInterface
     */
    protected $uploads;

    public function __construct(EntityRepository $applications, EntityRepository $positions, ContainerInterface $uploads)
    {
        $this->applications = $applications;
        $this->positions = $positions;
        $this->uploads = $uploads;

        parent::__construct();
    }

    public function init()
    {
        $hydrator = new Hydrator\Entity;
        $hydrator->addStrategy('positions', new EntityCollection($this->positions));
        $hydrator->addStrategy('resume', new Strategy\Upload($this->uploads));

        $this->setHydrator($hydrator);

        $this->add(array(
            'type' => 'MultiCheckbox',
            'name' => 'positions',

            'options' => array(
                'label' => 'Select Position(s)',
                'value_options' => $this->getPositionOptions(),
            ),
        ));

        $this->add(array(
            'type' => 'NasRecPublic:Fieldset:User',
            'name' => 'user',
        ));

        $this->add(array(
            'type' => 'file',
            'name' => 'resume',

            'options' => array(
                'label' => 'Resume',
            ),
        ));

        $this->add(array(
            'type' => 'submit',
            'name' => 'submit',

            'attributes' => array(
                'class' => 'btn btn-primary',
                'value' => 'Submit',
            ),
        ));
    }

    protected function getPositionOptions()
    {
        $opts = array();
        foreach ($this->positions->findAll() as $position) {
            $opts[$position->getId()] = $position->getName();
        }
        return $opts;
    }

    /**
     * Should return an array specification compatible with
     * {@link Zend\InputFilter\Factory::createInputFilter()}.
     *
     * @return array
     */
    public function getInputFilterSpecification()
    {
        return array(
            'positions' => array(
                'required' => true,
                'validators' => array(
                    array(
                        'name' => 'callback',
                        'options' => array(
                            'callback' => function () {
                                $previousApp = $this->applications->createQueryBuilder('a')
                                    ->leftJoin('a.user', 'u')
                                    ->where('u.email = :email')
                                    ->setParameter('email', $this->data['user']['email'])

                                    ->leftJoin('a.positions', 'p')
                                    ->andWhere('p.id IN (:pid)')
                                    ->setParameter('pid', $this->data['positions'])

                                    ->setMaxResults(1)

                                    ->getQuery()
                                    ->getOneOrNullResult()
                                ;

                                return $previousApp == null;
                            },
                            'message' => 'You have already submitted an application for this position',
                        ),
                    ),
                ),
            ),

            'resume' => array(
                'required' => true,
            ),
        );
    }
}
